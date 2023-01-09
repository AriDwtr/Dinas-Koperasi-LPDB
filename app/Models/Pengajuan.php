<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_user',
        'nama_usaha',
        'jenis_usaha',
        'bentuk_usaha',
        'kecamatan_usaha',
        'kelurahan_usaha',
        'kota_usaha',
        'provinsi_usaha',
        'alamat_usaha',
        'foto_usaha',
        'no_npwp',
        'npwp',
        'permohonan',
        'proposal',
        'akta',
        'keuangan',
        'legalitas',
        'status',
        'keterangan'
    ];
}
