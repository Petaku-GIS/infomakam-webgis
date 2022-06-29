<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <script src="leaflet/leaflet-src.js"></script>
    <script type="text/javascript" src="leaflet/leaflet.ajax.js"></script>
    <link rel="stylesheet" href="leaflet/Control.MiniMap.min.css" />
    <script src="leaflet/Control.MiniMap.min.js"></script>

	<link rel="stylesheet" href="leaflet/MarkerCluster.css" />
	<link rel="stylesheet" href="leaflet/MarkerCluster.Default.css" />
	<script src="leaflet/leaflet.markercluster-src.js"></script>

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
    <div class="fixed top-0 z-[10000] px-6 bg-slate-900 text-white w-11/12 mt-4 ml-20 rounded-xl drop-shadow-2xl">
        <div class="flex">
            <div class="flex-none py-4">
                <h1 class="inline-block align-middle text-gray-200">Info Makam</h1>
            </div>
            <div class="flex-auto mx-8 py-2.5">
                <div class="inline-flex flex-col relative text-gray-200 w-full">
                    <div class="relative rounded-xl">
                        <input id="input-search" type="text" class="rounded-xl w-full p-2 pl-8 rounded border border-slate-800 bg-slate-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Cari nama atau lokasi ..." />
                        <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <ul id="search-result" class="rounded-md p-2 bg-slate-800 text-gray-200 w-full mt-12 absolute"></ul>
                </div>
            </div>
            <div class="flex-none py-4">
                <button class="hover:bg-gray-700 rounded-full text-sm font-light px-4 py-1.5 text-gray-200 hover:text-gray-200"><a href="{{url('/about-us')}}">About Us</a></button>
                @if (session('id'))
                  <button class="bg-gray-700 rounded-full text-sm font-light px-6 py-1.5 text-gray-200 mr-4 hover:bg-slate-600"><a href="{{url('/logout')}}">Logout</a></button>
                @else
                  <button class="bg-gray-700 rounded-full text-sm font-light px-6 py-1.5 text-gray-200 mr-4 hover:bg-slate-600"><a href="{{url('/login')}}">Login</a></button>
                @endif
            </div>
        </div>
    </div>

    <div id="panel-info" class="hidden fixed z-[10000] px-6 bg-slate-900 text-white w-11/12 h-4/5 overflow-y-scroll  mt-24 ml-20 rounded-xl drop-shadow-2xl py-4">
        <div class="flex">
            <div class="flex-grow">
                <h2 class="inline-block align-middle ml-4" id="panel-info-nama-makam"> Nama Makam </h2>
            </div>
            <div class="flex-none">
                <button onclick="closePanelInfo();" class="rounded-xl bg-slate-800 text-white px-4 py-2 hover:bg-slate-700">X</button>
            </div>
        </div>
        <div class="flex">
            <div class="flex-none w-4/12 flex-wrap">
                <div class="h-44 bg-gray-500 rounded-md m-4"></div>
                <table class="m-4 text-sm font-light">
                    <tr class="mt-2">
                        <td>Pengelola</td>
                        <td class="w-4"></td>
                        <td id="makam-info-pengelola">: -</td>
                    </tr>
                    <tr class="mt-2">
                        <td class="align-top">Alamat</td>
                        <td class="w-4"></td>
                        <td id="makam-info-alamat">: -</td>
                    </tr>
                </table>
                <p id="makam-info-deskripsi" class="break-words ml-4 font-light text-sm mb-4">-</p>
                <div class="ml-4 mt-2 flex">
                    <a id="reservasi-link" target="_blank" class="text-center bg-slate-800 text-white text-sm font-light rounded-md py-2 px-4 flex-auto mr-2 hover:bg-slate-700" >Reservasi</a>
                </div>
            </div>
            <div class="flex-auto">
                <div class="flex flex-col">
                  <div>
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden">
                        <table class="min-w-full m-4">
                          <thead class="border-b rounded-md">
                            <tr>
                              <th scope="col" class="text-sm font-medium text-gray-900 bg-white px-6 py-4 text-left">
                                Nama
                              </th>
                              <th scope="col" class="text-sm font-medium text-gray-900 bg-white  px-6 py-4 text-left">
                                Deskripsi
                              </th>
                              <th scope="col" class="text-sm font-medium text-gray-900 bg-white  px-6 py-4 text-left">
                                Ketersediaan
                              </th>
                              <th scope="col" class="text-sm font-medium text-gray-900 bg-white  px-6 py-4 text-left">
                                Harga
                              </th>
                            </tr>
                          </thead>
                          <tbody id="tabel-harga"></tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


     <div id="map"></div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="map.js"></script>
</body>
</html>
