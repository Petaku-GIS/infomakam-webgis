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
    public $timestamps = true;

    protected $fillable = [
        'user_id_pengelola',
        'nama_makam',
        'id_kec',
        'whatsapp_contact',
        'phone_contact',
        'description',
        'photos',
        'type',
    ];
}
