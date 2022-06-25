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
    <div class="fixed top-0 z-[10000] px-6 bg-slate-900 text-white w-11/12 mt-4 ml-20 rounded-xl drop-shadow-2xl">
        <div class="flex">
            <div class="flex-none py-4">
                <h1 class="inline-block align-middle text-gray-200">Cemetry Info</h1>
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
                <button class="hover:bg-gray-700 rounded-full text-sm font-light px-4 py-1.5 text-gray-200 hover:text-gray-200">About Us</button>
                <button class="hover:bg-gray-700 rounded-full text-sm font-light px-6 py-1.5 text-gray-200 hover:text-gray-200 mr-2">Docs</button>
                <button class="bg-gray-700 rounded-full text-sm font-light px-6 py-1.5 text-gray-200 mr-4 hover:bg-slate-600">Login</button>
            </div>
        </div>
    </div>

    <div id="panel-info" class="hidden fixed z-[10000] px-6 bg-slate-900 text-white w-11/12 h-4/5  mt-24 ml-20 rounded-xl drop-shadow-2xl py-4">
        <div class="flex">
            <div class="flex-grow">
                <h2 class="inline-block align-middle">Tempat Wawawa</h2>
            </div>
            <div class="flex-none">
                <button onclick="closePanelInfo();" class="rounded-xl bg-slate-800 text-white px-4 py-2 hover:bg-slate-700">X</button>
            </div>
        </div>
    </div>


     <div id="map"></div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="map.js"></script>
</body>
</html>
