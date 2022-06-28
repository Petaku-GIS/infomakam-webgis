<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makam extends Model
{
    use HasFactory;
    protected $table = 'makam';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id_pengelola',
        'nama_makam',
        'alamat',
        'id_kec',
        'whatsapp_contact',
        'description',
        'photos',
        'type',
    ];
}
