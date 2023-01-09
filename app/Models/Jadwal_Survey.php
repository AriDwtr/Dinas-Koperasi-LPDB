<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Survey extends Model
{
    use HasFactory;

    protected $table = 'jadwal_survey';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'id_pengajuan',
        'id_user',
        'status_survey',
        'tanggal_survey',
        'hasil_survey',
        'dokumen_survey',
    ];
}
