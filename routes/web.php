<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarMahasiswa;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\TahsinController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfilUsahaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PptController;
use App\Http\Controllers\SkuController;
use App\Models\Laporan;

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
    return view('auth/login');
});

// Route::get('/', [Controller::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('profil/edit', [ProfilController::class, 'edit'])->name('profile.edit');
    Route::get('profil/edit/password', [ProfilController::class, 'edit2'])->name('profile.edit_password');
    Route::patch('profil/update', [ProfilController::class, 'update'])->name('profile.update');
    Route::patch('profil/update/password', [ProfilController::class, 'update2'])->name('profile.update2');

    Route::get('/data_mahasiswa', [DaftarMahasiswa::class, 'index'])->name('mahasiswa');
    Route::get('/mahasiswa/destroy/{id}', [DaftarMahasiswa::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('/mahasiswa/edit/{id}', [DaftarMahasiswa::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{id}', [DaftarMahasiswa::class, 'update'])->name('mahasiswa.update');

    Route::get('/pesan/create', [PesanController::class, 'create'])->name('pesan.create');
    Route::post('/pesan/store', [PesanController::class, 'store'])->name('pesan.store');
    Route::get('/pesan/edit/{id}', [PesanController::class, 'edit'])->name('pesan.edit');
    Route::post('/pesan/update/{id}', [PesanController::class, 'update'])->name('pesan.update');
    Route::get('/pesan/destroy/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');

    Route::get('/grafik_portofolio', [PortofolioController::class, 'index'])->name('portofolio');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/edit/{id}', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::post('/laporan/update/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/destroy/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa');
    Route::get('/beasiswa/create', [BeasiswaController::class, 'create'])->name('beasiswa.create');
    Route::post('/beasiswa/store', [BeasiswaController::class, 'store'])->name('beasiswa.store');
    Route::post('/beasiswa/store1', [BeasiswaController::class, 'store1'])->name('beasiswa.store1');
    Route::post('/beasiswa/store2', [BeasiswaController::class, 'store2'])->name('beasiswa.store2');
    Route::get('/beasiswa/edit/{id}', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
    Route::post('/beasiswa/update/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
    Route::get('/beasiswa/destroy/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');

    Route::get('/forum', [ForumController::class, 'index'])->name('forum');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/edit/{id}', [ForumController::class, 'edit'])->name('forum.edit');
    Route::post('/forum/update/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::get('/forum/destroy/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

    Route::get('/karya', [KaryaController::class, 'index'])->name('karya');
    Route::get('/karya/create', [KaryaController::class, 'create'])->name('karya.create');
    Route::post('/karya/store', [KaryaController::class, 'store'])->name('karya.store');
    Route::get('/karya/edit/{id}', [KaryaController::class, 'edit'])->name('karya.edit');
    Route::post('/karya/update/{id}', [KaryaController::class, 'update'])->name('karya.update');
    Route::get('/karya/destroy/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');

    Route::get('/mentoring', [MentoringController::class, 'index'])->name('mentoring');
    Route::get('/mentoring/create', [MentoringController::class, 'create'])->name('mentoring.create');
    Route::post('/mentoring/store', [MentoringController::class, 'store'])->name('mentoring.store');
    Route::get('/mentoring/edit/{id}', [MentoringController::class, 'edit'])->name('mentoring.edit');
    Route::post('/mentoring/update/{id}', [MentoringController::class, 'update'])->name('mentoring.update');
    Route::get('/mentoring/destroy/{id}', [MentoringController::class, 'destroy'])->name('mentoring.destroy');

    Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/organisasi/edit/{id}', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::post('/organisasi/update/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::get('/organisasi/destroy/{id}', [OrganisasiController::class, 'destroy'])->name('organisasi.destroy');

    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi/store', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi/edit/{id}', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::post('/prestasi/update/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::get('/prestasi/destroy/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    Route::get('/sosial', [SosialController::class, 'index'])->name('sosial');
    Route::get('/sosial/create', [SosialController::class, 'create'])->name('sosial.create');
    Route::post('/sosial/store', [SosialController::class, 'store'])->name('sosial.store');
    Route::get('/sosial/edit/{id}', [SosialController::class, 'edit'])->name('sosial.edit');
    Route::post('/sosial/update/{id}', [SosialController::class, 'update'])->name('sosial.update');
    Route::get('/sosial/destroy/{id}', [SosialController::class, 'destroy'])->name('sosial.destroy');

    Route::get('/tahsin', [TahsinController::class, 'index'])->name('tahsin');
    Route::get('/tahsin/create', [TahsinController::class, 'create'])->name('tahsin.create');
    Route::post('/tahsin/store', [TahsinController::class, 'store'])->name('tahsin.store');
    Route::get('/tahsin/edit/{id}', [TahsinController::class, 'edit'])->name('tahsin.edit');
    Route::post('/tahsin/update/{id}', [TahsinController::class, 'update'])->name('tahsin.update');
    Route::get('/tahsin/destroy/{id}', [TahsinController::class, 'destroy'])->name('tahsin.destroy');

    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create')->middleware('auth');;
    Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store')->middleware('auth');;
    Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::post('/nilai/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::get('/nilai/destroy/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

    Route::get('/profil-usaha', [ProfilUsahaController::class, 'index'])->name('profil-usaha');
    Route::get('/profil-usaha/create', [ProfilUsahaController::class, 'create'])->name('profil-usaha.create');
    Route::post('/profil-usaha/store', [ProfilUsahaController::class, 'store'])->name('profil-usaha.store');
    Route::get('/profil-usaha/edit/{id}', [ProfilUsahaController::class, 'edit'])->name('profil-usaha.edit');
    Route::post('/profil-usaha/update/{id}', [ProfilUsahaController::class, 'update'])->name('profil-usaha.update');
    Route::get('/profil-usaha/destroy/{id}', [ProfilUsahaController::class, 'destroy'])->name('profil-usaha.destroy');

    Route::get('/keuangan-usaha', [KeuanganController::class, 'index'])->name('keuangan');
    Route::get('/keuangan-usaha/create', [KeuanganController::class, 'create'])->name('keuangan.create');
    Route::post('keuangan-usaha/store', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::get('/keuangan-usaha/edit/{id}', [KeuanganController::class, 'edit'])->name('keuangan.edit');
    Route::post('keuangan-usaha/update/{id}', [KeuanganController::class, 'update'])->name('keuangan.update');
    Route::get('/keuangan-usaha/destroy/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');

    Route::get('/ppt', [PptController::class, 'index'])->name('ppt');
    Route::get('/ppt/create', [PptController::class, 'create'])->name('ppt.create');
    Route::post('ppt/store', [PptController::class, 'store'])->name('ppt.store');
    Route::get('/ppt/edit/{id}', [PptController::class, 'edit'])->name('ppt.edit');
    Route::post('ppt/update/{id}', [PptController::class, 'update'])->name('ppt.update');
    Route::get('/ppt/destroy/{id}', [PptController::class, 'destroy'])->name('ppt.destroy');

    Route::get('/sku', [SkuController::class, 'index'])->name('sku');
    Route::get('/sku/create', [SkuController::class, 'create'])->name('sku.create');
    Route::post('sku/store', [SkuController::class, 'store'])->name('sku.store');
    Route::get('/sku/edit/{id}', [SkuController::class, 'edit'])->name('sku.edit');
    Route::post('sku/update/{id}', [SkuController::class, 'update'])->name('sku.update');
    Route::get('/sku/destroy/{id}', [SkuController::class, 'destroy'])->name('sku.destroy');

    Route::post('/cetak', [CetakController::class, 'store'])->name('cetak');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/angkatan/store', [HomeController::class, 'store'])->name('angkatan.store');
    Route::get('/angkatan/destroy/{id}', [HomeController::class, 'destroy'])->name('angkatan.destroy');
});


Auth::routes();
