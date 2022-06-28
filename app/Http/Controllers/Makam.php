<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use App\Models\Kecamatan;
use App\Models\Makam as ModelsMakam;
use Exception;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class Makam extends Controller
{

    function __construct()
    {

    $this->lokasi = '{
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.610107421875,
          -6.959144154386006
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.368408203125,
          -7.111794602472421
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.79711914062499,
          -7.231698708367139
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.21484375,
          -7.264394325339767
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.511474609375,
          -7.787193658965735
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.50048828124999,
          -7.406047717076258
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.005859375,
          -7.373362480979622
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.42333984375,
          -7.438730529686968
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.09374999999999,
          -7.83073144786945
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.39038085937499,
          -7.906911616469297
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.159423828125,
          -7.351570982365011
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.851806640625,
          -7.079088026071719
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.785888671875,
          -7.950436835029361
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.32421875,
          -7.591217970942763
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.3798828125,
          -7.362466865535738
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.9072265625,
          -7.504088842638866
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.599609375,
          -7.329778414392971
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.51171875,
          -7.504088842638866
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.10498046875,
          -7.743651345263343
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.55541992187499,
          -8.015715997869059
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.544677734375,
          -7.678329444702256
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.03881835937499,
          -6.850077654785543
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.72021484375,
          -6.675519529024594
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.884765625,
          -7.460517719883772
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.071533203125,
          -7.852498637813016
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.654052734375,
          -8.091861780114707
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.20361328125,
          -8.167993177231883
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.1484375,
          -8.080984688871991
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.510986328125,
          -7.700104531441816
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.620849609375,
          -7.917793352627911
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.401123046875,
          -7.993957436359008
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.04931640625,
          -7.0245719178463695
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.40087890624999,
          -7.002763681982734
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.18115234375,
          -7.046379130937701
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.477783203125,
          -7.089990476360545
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.77490234375,
          -7.547655601241832
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.5057373046875,
          -7.362466865535738
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.3189697265625,
          -7.3025362053673275
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.5057373046875,
          -7.8089631205593895
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.22558593749999,
          -7.79263613053461
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.69226074218749,
          -8.211490323420682
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.9669189453125,
          -8.048351657539454
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.8680419921875,
          -8.129929285046783
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.9998779296875,
          -7.841615185204699
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.1866455078125,
          -7.99939718565
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.06579589843749,
          -7.841615185204699
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.0877685546875,
          -8.206053440215015
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.22509765625,
          -8.059229627200192
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.3294677734375,
          -7.90147064072684
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.32397460937499,
          -7.993957436359008
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.26904296874999,
          -8.108176866407044
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.53271484375,
          -8.227800526152265
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.653564453125,
          -8.206053440215015
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.6260986328125,
          -7.98851761453913
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.7744140625,
          -8.02659484248955
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.8238525390625,
          -8.282163012795495
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.65905761718749,
          -8.298470297067356
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.8897705078125,
          -8.021155456563902
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.8897705078125,
          -8.097300215669726
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.06005859375,
          -8.157118149071993
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.093017578125,
          -8.352823015039577
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.169921875,
          -8.5918844057982
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          113.9556884765625,
          -8.439771599521729
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.268798828125,
          -8.070107304439091
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.1094970703125,
          -7.906911616469297
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          114.2523193359375,
          -8.265855052877221
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          112.4560546875,
          -8.173430580237765
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.9564208984375,
          -7.977637753504988
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.775146484375,
          -7.547655601241832
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.885009765625,
          -7.68377332111113
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.03881835937499,
          -7.525872769006524
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.2862548828125,
          -7.416942257739039
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.3192138671875,
          -7.542209995927084
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.4840087890625,
          -7.0845392834450545
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.97314453125,
          -7.079088026071719
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.8797607421875,
          -7.242597510949338
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.7808837890625,
          -7.716435112415487
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.2532958984375,
          -7.923234112947838
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.6490478515625,
          -7.046379130937701
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.3743896484375,
          -7.111794602472421
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.53369140625,
          -7.117245472370001
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          109.720458984375,
          -7.411495021091383
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.76416015625,
          -6.931879889517204
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.03881835937499,
          -7.046379130937701
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.85205078124999,
          -7.01366792756663
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.6378173828125,
          -7.062733867690442
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.5938720703125,
          -7.204450551811732
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.14868164062499,
          -7.133597693372753
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.29150390625,
          -6.82826134882511
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.192626953125,
          -6.893707270014225
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          111.258544921875,
          -7.536764322084078
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.7257080078125,
          -7.716435112415487
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Point",
        "coordinates": [
          110.7257080078125,
          -7.939555962292796
        ]
      }
    }
  ]
}';
    }

    public function fake()
    {
        $loc = json_decode($this->lokasi)->features;
        $makams = ModelsMakam::select('*')->get();
        $counter = 0;
        foreach($makams as $makam) {
            var_dump($loc[0]->geometry);
           DB::insert("UPDATE makam SET Location = ST_GeomFromText('POINT(".$loc[$counter]->geometry->coordinates[0]." ".$loc[$counter]->geometry->coordinates[1].")', 0) WHERE id = ".$makam->id);
            $counter++;
        }
        //for ($i = 0; $i < 100; $i++) {
            //$idMakam = DB::table('makam')->insertGetId([
            //    'user_id_pengelola' => 1,
            //    'nama_makam' => Factory::create('ID')->name,
            //    'description' => Factory::create('ID')->words(5, true),
            //    'alamat' => Factory::create('ID')->address,
            //    'id_kec' => 332109,
            //    'whatsapp_contact' => '005859375',
            //    'phone_contact' => '005859375'
            //]);
            //for ($i = 0; $i < 5; $i++) {
            //    DB::table('daftar_harga')->insert(([
            //        'makam_id' => $idMakam,
            //        'name' => Factory::create('ID')->name,
            //        'description' => Factory::create('ID')->words(2, true),
            //        'ketersediaan' => Factory::create()->numberBetween(50, 100),
            //        'harga' => Factory::create()->numberBetween(1000000, 1500000),
            //    ]));
            //}
        //}
    }
    public function getMakamPrice($id): JsonResponse
    {
        $result = DaftarHarga::select('*')->where('makam_id', $id)->get();
        return response()->json($result, 200);
    }

    public function getDetailMakam($id): JsonResponse
    {
        $result = ModelsMakam::select(
                'makam.id',
                'makam.nama_makam',
                'makam.alamat',
                'makam.description',
                'makam.whatsapp_contact',
                'kecamatan.kecamatan',
                'users.name AS pengelola',
                'kecamatan.kpu_kab AS kabupaten',
                'kecamatan.kpu_prov AS provinsi',
                DB::raw('(SELECT MIN(harga) minHarga FROM daftar_harga WHERE makam_id = makam.id) minHarga'),
                DB::raw('ST_Y(makam.Location) as lat, ST_X(makam.Location) as lng'),
            )
            ->join('kecamatan', 'kecamatan.kpu_idkec', '=', 'makam.id_kec')
            ->join('users', 'users.id', '=', 'makam.user_id_pengelola')
            ->where('makam.id', $id)
            ->first();
        return response()->json($result, 200);
    }

    public function geojsonMakam(): JsonResponse
    {
        $geomCollection = ModelsMakam::select(
                'makam.id',
                'makam.nama_makam',
                DB::raw('ST_asGeoJson(Location) AS geom'),
        )->get();

        $features = [];
        foreach($geomCollection as $geom) {
            $features[] = [
                "type" => "Feature",
                "properties" => [
                    "id" => $geom["id"],
                    "nama" => $geom["nama_makam"],
                ],
                "geometry" => json_decode($geom["geom"]),
            ];
        }

        $featuresCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        return response()->json($featuresCollection, 200);

    }

    public function searchMakam(Request $request): JsonResponse
    {
        // ST_GeomFromText('POINT(111.01821899414062 -7.63315959762244)',0)
        $keyword = $request->query("keyword");
        if ($keyword) {
            $result = [
                'makam' => [],
                'daerah' => [],
            ];
            $result['makam'] = ModelsMakam::select(
                'makam.id',
                'makam.nama_makam',
                'kecamatan.kecamatan',
                'kecamatan.kpu_kab AS kabupaten',
                'kecamatan.kpu_prov AS provinsi',
                DB::raw('(SELECT MIN(harga) minHarga FROM daftar_harga WHERE makam_id = makam.id) minHarga'),
                DB::raw('ST_Y(makam.Location) as lat, ST_X(makam.Location) as lng'),
            )
             ->join('kecamatan', 'kecamatan.kpu_idkec', '=', 'makam.id_kec')
             ->where('makam.nama_makam', 'like', '%' . $keyword . '%')
             ->limit(5)->get();

            $result['daerah'] = Kecamatan::select(
                DB::raw("
                CASE
                    WHEN '".$keyword."' = kecamatan.kecamatan THEN 'KECAMATAN'
                    WHEN '".$keyword."' = kecamatan.kpu_kab THEN 'KABUPATEN'
                    WHEN '".$keyword."' = kecamatan.kpu_prov THEN 'PROVINSI'
                    ELSE 'NULL'
                END AS found"),
                 DB::raw("
                CASE
                    WHEN '".$keyword."' = kecamatan.kecamatan THEN kecamatan.kecamatan
                    WHEN '".$keyword."' = kecamatan.kpu_kab THEN kecamatan.kpu_kab
                    WHEN '".$keyword."' = kecamatan.kpu_prov THEN kecamatan.kpu_prov
                    ELSE 'NULL'
                END AS found_daerah"),
                'kecamatan.kpu_prov AS provinsi',
                'kecamatan.kpu_kab AS kabupaten',
                'kecamatan.kecamatan AS kecamatan',
                'kecamatan.kpu_idprov AS id_prov',
                'kecamatan.kpu_idkab AS id_kab',
                'kecamatan.kpu_idkec AS id_kec',
                DB::raw('ST_asGeoJson(SHAPE) AS geom'),
            )->where('kecamatan.kpu_prov', 'like', '%' . $keyword . '%')
             ->orWhere('kecamatan.kpu_kab', 'like', '%' . $keyword . '%')
             ->orWhere('kecamatan.kecamatan', 'like', '%' . $keyword . '%')
             ->limit(5)->get();

            return response()->json([
                'message' => 'success',
                'data' => $result,
            ], 200);
        }
        return response()->json([
            'message' => 'error',
            'data' => new stdClass,
        ], 400);
    }

}
