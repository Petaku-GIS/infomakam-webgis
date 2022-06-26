<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHarga extends Model
{
    use HasFactory;
    protected $table = 'daftar_harga';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'harga',
        'ketersediaan',
        'id'
    ];
}
