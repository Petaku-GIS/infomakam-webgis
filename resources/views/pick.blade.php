<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <script src="leaflet/leaflet-src.js"></script>
    <script type="text/javascript" src="{{asset("leaflet/leaflet.ajax.js")}}"></script>
    <link rel="stylesheet" href="leaflet/Control.MiniMap.min.css" />
    <script src="leaflet/Control.MiniMap.min.js"></script>
    <style>
      html {
        height: 100%;
      }
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
</head>
<body>

     <div id="map"></div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
        mainMap.locate();

        let popup = L.popup().setContent("Plih lokasi");
        let pickerMarker = L.marker(mainMap.getCenter()).addTo(mainMap);
        pickerMarker.bindPopup(popup).openPopup();

        mainMap.on('moveend', (e) => {
            let loc = mainMap.getCenter();
            console.log(loc);
            pickerMarker.setLatLng(loc);
        });

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


        baseMaps.googleHybrid.addTo(mainMap);

    L.control.scale().addTo(mainMap);

    L.control
        .layers(baseMaps, null, { position: "bottomleft" })
        .addTo(mainMap);

    </script>
</body>
</html>
