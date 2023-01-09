<?php

use App\Http\Controllers\Masyarakat\DataDiriMasyarakatController;
use App\Http\Controllers\Masyarakat\DownloadDokumenMasyarakatController;
use App\Http\Controllers\Masyarakat\HomeMasyarakatController;
use App\Http\Controllers\masyarakat\PasswordMasyarakatController;
use App\Http\Controllers\Masyarakat\PengajuanLPDBMasyarakatController;
use App\Http\Controllers\masyarakat\SKPenerimaanMasyarakatController;
use App\Http\Controllers\masyarakat\SurveyPengajuanMasyarakatController;
use App\Http\Controllers\Pegawai\DataPegawaiController;
use App\Http\Controllers\Pegawai\DownloadBerkasPengajuanLPDBPegawaiController;
use App\Http\Controllers\Pegawai\HomePegawaiController;
use App\Http\Controllers\Pegawai\MasyarakatPegawaiController;
use App\Http\Controllers\Pegawai\PengajuanLPDBTerimaPegawaiController;
use App\Http\Controllers\Pegawai\PengajuanLPDBTinjauPegawaiController;
use App\Http\Controllers\pegawai\ProfilePegawaiController;
use App\Http\Controllers\Pegawai\ProsesPengajuanLPDBPegawaiController;
use App\Http\Controllers\pegawai\SurveyUsahaPegawaiController;
use App\Http\Controllers\survey\DaftarCekSurveyController;
use App\Http\Controllers\Survey\HomeSurveyController;
use App\Http\Controllers\survey\ProfileSurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:pegawai'])->group(function () {

    Route::get('/pegawai/home', [HomePegawaiController::class, 'index'])->name('pegawai.home');

    Route::resource('/pegawai/data-pegawai', DataPegawaiController::class);

    Route::get('/pegawai/profile', [ProfilePegawaiController::class, 'index'])->name('pegawai.profile');
    Route::put('/pegawai/profile/update/{profile}', [ProfilePegawaiController::class, 'update_profile'])->name('pegawai.profile_update');

    Route::get('/pegawai/ubah-password', [ProfilePegawaiController::class, 'password'])->name('pegawai.password');
    Route::put('/pegawai/ubah-password/update/{password}', [ProfilePegawaiController::class, 'update_password'])->name('pegawai.password_update');

    Route::get('/pegawai/data-masyarakat', [MasyarakatPegawaiController::class, 'index'])->name('pegawai.masyarakat');
    Route::get('/pegawai/data-masyarakat/detail/{masyarakat}', [MasyarakatPegawaiController::class, 'detail_masyarakat'])->name('pegawai.masyarakat_detail');

    Route::get('/pegawai/pengajuan-tinjau', [PengajuanLPDBTinjauPegawaiController::class, 'index'])->name('pegawai.pengajuan_tinjau');
    Route::get('/pegawai/pengajuan-tinjau/cek/{pengajuan}', [PengajuanLPDBTinjauPegawaiController::class, 'detail_pengajuan_tinjau'])->name('pegawai.pengajuan_tinjau_cek');

    Route::get('/pegawai/pengajuan-tinjau/cek/terima/{pengajuan}', [ProsesPengajuanLPDBPegawaiController::class, 'terima'])->name('pegawai.pengajuan_terima');
    Route::post('/pegawai/pengajuan-tinjau/cek/tolak', [ProsesPengajuanLPDBPegawaiController::class, 'tolak'])->name('pegawai.pengajuan_tolak');

    Route::get('/pegawai/pengajuan-terima', [PengajuanLPDBTerimaPegawaiController::class, 'index'])->name('pegawai.pengajuan_diterima_index');
    Route::get('/pegawai/pengajuan-terima/jadwal/{pengajuan}', [PengajuanLPDBTerimaPegawaiController::class, 'buat_jadwal'])->name('pegawai.pengajuan_diterima_create');
    Route::post('/pegawai/pengajuan-terima/jadwal', [PengajuanLPDBTerimaPegawaiController::class, 'store_jadwal'])->name('pegawai.pengajuan_diterima_store');

    Route::get('/pegawai/pengajuan-tinjau/download/permohonan/{pengajuan}', [DownloadBerkasPengajuanLPDBPegawaiController::class, 'permohonan'])->name('pegawai.download_permohonan');
    Route::get('/pegawai/pengajuan-tinjau/download/proposal/{pengajuan}', [DownloadBerkasPengajuanLPDBPegawaiController::class, 'proposal'])->name('pegawai.download_proposal');
    Route::get('/pegawai/pengajuan-tinjau/download/akta/{pengajuan}', [DownloadBerkasPengajuanLPDBPegawaiController::class, 'akta'])->name('pegawai.download_akta');
    Route::get('/pegawai/pengajuan-tinjau/download/keuangan/{pengajuan}', [DownloadBerkasPengajuanLPDBPegawaiController::class, 'keuangan'])->name('pegawai.download_keuangan');
    Route::get('/pegawai/pengajuan-tinjau/download/legalitas/{pengajuan}', [DownloadBerkasPengajuanLPDBPegawaiController::class, 'legalitas'])->name('pegawai.download_legalitas');

    Route::get('/pegawai/survey', [SurveyUsahaPegawaiController::class, 'index'])->name('pegawai.survey_usaha');
    Route::get('/pegawai/survey/hasil', [SurveyUsahaPegawaiController::class, 'hasil_survey'])->name('pegawai.survey_usaha_hasil');
    Route::post('/pegawai/survey/cek', [SurveyUsahaPegawaiController::class, 'cek_survey'])->name('pegawai.cek_survey');
});

Route::middleware(['auth', 'user-access:survey'])->group(function () {

    Route::get('/survey/home', [HomeSurveyController::class, 'index'])->name('survey.home');
    Route::get('/survey/lembar_penilaian/{survey}', [HomeSurveyController::class, 'lembar_penilaian'])->name('survey.lembar_penilaian');

    Route::put('/survey/hasil_upload/{survey}', [HomeSurveyController::class, 'hasil_upload'])->name('survey.hasil_upload');

    Route::get('/survey/list-survey', [DaftarCekSurveyController::class, 'index'])->name('survey.list_survey');

    Route::get('/survey/profile', [ProfileSurveyController::class, 'index'])->name('survey.profile');
    Route::put('/survey/profile/update/{profile}', [ProfileSurveyController::class, 'update_profile'])->name('survey.profile_update');

    Route::get('/survey/ubah-password', [ProfileSurveyController::class, 'password'])->name('survey.password');
    Route::put('/survey/ubah-password/update/{password}', [ProfileSurveyController::class, 'update_password'])->name('survey.password_update');
});


Route::middleware(['auth', 'user-access:masyarakat'])->group(function () {


    Route::get('/masyarakat/home', [HomeMasyarakatController::class, 'index'])->name('masyakarat.home');

    Route::get('/masyarakat/data-diri', [DataDiriMasyarakatController::class, 'index'])->name('masyakarat.diri');
    Route::post('/masyarakat/data-diri', [DataDiriMasyarakatController::class, 'update_data_diri'])->name('masyakarat.diri_update');

    Route::resource('/masyarakat/pengajuan-LPDB', PengajuanLPDBMasyarakatController::class);

    Route::get('/masyarakat/download/permohonan', [DownloadDokumenMasyarakatController::class, 'permohonan'])->name('masyakarat.download_permohonan');

    Route::get('/masyarakat/sk_sementara/{sk}', [SKPenerimaanMasyarakatController::class, 'index'])->name('masyarakat.sk_masyarakat');

    Route::get('/masyarakat/ubah-password', [PasswordMasyarakatController::class, 'index'])->name('masyarakat.password');
    Route::put('/masyarakat/ubah-password/update/{password}', [PasswordMasyarakatController::class, 'update_password'])->name('masyarakat.password_update');
});
