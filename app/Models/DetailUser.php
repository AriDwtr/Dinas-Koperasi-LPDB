<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $table = 'detail_user';
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'nama',
        'nik',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'telp',
        'kecamatan',
        'kelurahan',
        'kota',
        'provinsi',
        'alamat',
        'ktp',
    ];
}
