<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'kpu_prov',
        'kpu_kab',
        'kecamatan',
        'kpu_idprov',
        'kpu_idkab',
        'kpu_idkec',
        'SHAPE',
    ];
}
