const formatRupiah = (number) => {
    var number_string = number.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        last = split[0].length % 3,
        rupiah = split[0].substr(0, last),
        thousand = split[0].substr(last).match(/\d{3}/gi);

    if (thousand) {
        separator = last ? "." : "";
        rupiah += separator + thousand.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return rupiah;
};

let mainMap = L.map("map").setView([-3.63392522809151, 120.032981872559], 5);

// detect location
mainMap.on("locationfound", (e) => {
    console.log("location accuracy", e.accuracy);
    console.log(e);
    mainMap.flyTo(e.latlng, 16);
});

mainMap.on("locationerror", (e) => {
    console.log(e);
    mainMap.locate();
});

const gotoMyLocation = () => {
    mainMap.locate();
}

const onEachMakamIcon = (feature, latlng) => {
    console.log(feature.properties);

    return L.marker(latlng, {
        icon: L.icon({
            iconUrl: "grave.svg",
            iconSize: [25, 25],
        }),
    });
};

let makamLayer = new L.GeoJSON.AJAX("api/geojson/makam", {
    pointToLayer: onEachMakamIcon,
}).addTo(mainMap);

let baseMaps = {
    googleStreets: L.tileLayer(
        "http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
    googleHybrid: L.tileLayer(
        "http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
    googleTerrain: L.tileLayer(
        "http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}",
        {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
        }
    ),
};
let overlayMaps = {
    makam: makamLayer
};

baseMaps.googleHybrid.addTo(mainMap);

L.control.scale().addTo(mainMap);

L.control
    .layers(baseMaps, overlayMaps, { position: "bottomleft" })
    .addTo(mainMap);

mainMap.zoomControl.setPosition("bottomleft");

let searchHistory = [];


const gotoLocationMakam = (lat, lng, id) => {
    console.log(lat, lng, id);
    mainMap.flyTo(L.latLng(lat, lng), 16);
    $('#search-result').fadeOut();
};

let searchPolygon = L.geoJSON();

const gotoLocationDaerah = (idx) => {
    $('#search-result').fadeOut();
    mainMap.removeLayer(searchPolygon);
    console.log(searchHistory[idx].geom);
    searchPolygon = L.geoJSON(JSON.parse(searchHistory[idx].geom), {
        style: {
          fillColor: "#fffff",
          weight: 3,
          opacity: 1,
          color: "white",
          dashArray: "6",
          fillOpacity: 0.1,
        },
    })
    searchPolygon.addTo(mainMap);
    mainMap.flyToBounds(searchPolygon.getBounds());
};

// search -- section

const Loading = `<svg
			class='animate-spin ml-1 mr-3 h-5 w-5 text-white'
			xmlns='http://www.w3.org/2000/svg'
			fill='none'
			viewBox='0 0 24 24'
		>
			<circle
				class='opacity-80'
				cx='12'
				cy='12'
				r='10'
				stroke='currentColor'
				strokeWidth='4'
			></circle>
			<path
				class='opacity-75'
				fill='currentColor'
				d='M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z'
			></path>
		</svg>`;

let resultBoard = $("#search-result");


// build search result
const buildSearchResult = (data) => {
    searchHistory = [];

    resultBoard.append(`<li onclick="gotoMyLocation();" class="rounded-md pl-8 pr-2 py-1 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                            <img class="absolute w-4 h-4 left-2 top-2" src="gps.png" />
                            <div class="flex">
                                <div class="flex-none text-sm">Cari terdekat dengan lokasi terkini</div>
                                <div class="flex-auto"></div>
                                <div class="flex-none text-sm"i></div>
                            </div>
                        </li>
    `);
    data.makam.map((v) => {
        resultBoard.append(`<li onclick="gotoLocationMakam(${v.lat}, ${v.lng}, ${v.id});" class="rounded-md pl-8 pr-2 py-1 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                            <svg class="absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex">
                                <div class="flex-none text-sm">Makam : ${
                                    v.nama_makam
                                }<br>${v.kecamatan}, ${v.kabupaten}, ${v.provinsi}</div>
                                <div class="flex-auto"></div>
                                <div class="flex-none text-sm">${formatRupiah(
                                    JSON.stringify(v.minHarga)
                                )}/petak</div>
                            </div>
                        </li>
        `);
    });
    data.daerah.map((v,i) => {
        searchHistory.push(v);
        resultBoard.append(`
                        <li onclick="gotoLocationDaerah('${i}');" class="rounded-md pl-8 pr-2 py-1 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                            <svg class="absolute w-4 h-4 left-2 top-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex">
                                <div class="flex-none text-sm">Cari Makam di ${v.kecamatan}, ${v.kabupaten}, ${v.provinsi} </div>
                                <div class="flex-auto"></div>
                                <div class="flex-none text-sm"></div>
                            </div>
                        </li>
        `);
    });

};

let isLoadingLock = false;
const searchMakam = (keyword) => {
    if (keyword == "" || keyword == null) {
        resultBoard.css("display", "none");
        return;
    }
    resultBoard.css("display", "block");
    isLoadingLock = true;
    resultBoard.html('<li class="p-4 inline-block">' + Loading + "</li>");

    const lockReleaser = setTimeout(() => {
        isLoadingLock = false;
    }, 60000);

    $.ajax({
        url: `/api/search?keyword=${keyword}`,
        method: "GET",
        success: function (response) {
            resultBoard.html("");
            console.log(response);
            buildSearchResult(response.data);
            isLoadingLock = false;
            clearTimeout(lockReleaser);
        },
    });
};

let panelInfo = $("#panel-info");
const closePanelInfo = () => {
    panelInfo.fadeOut();
};

// main
$(document).ready(() => {
    $("#map").hover(() => {
        resultBoard.css("display", "none");
    });
    $("#panel-info").hover(() => {
        resultBoard.css("display", "none");
    });
    $("#input-search").hover(() => {
        resultBoard.css("display", "block");
    });

    console.log("ready");
    let searchInput = $("#input-search");
    searchMakam(searchInput.val());
    searchInput.keyup(() => {
        if (!isLoadingLock) {
            console.log(searchInput.val());
            searchMakam(searchInput.val());
        }
    });
});
