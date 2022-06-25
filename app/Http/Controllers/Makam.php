<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Makam as ModelsMakam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class Makam extends Controller
{

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
