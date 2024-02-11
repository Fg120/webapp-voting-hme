<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SendMailController;
use App\Http\Middleware\AdminCheck;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::middleware('auth')->group(
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::post('/', [HomeController::class, 'store'])->name('home.store');

        Route::get('/logout', [AuthController::class, 'destroy'])->name('auth.logout');

        Route::middleware(AdminCheck::class)->group(
            function () {
                Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

                Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
                Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
                Route::post('/admin/mahasiswa/create', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
                Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
                Route::post('/admin/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
                Route::get('/admin/mahasiswa/show/{id}', [MahasiswaController::class, 'show'])->name('admin.mahasiswa.show');
                Route::delete('/admin/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');

                Route::post('/admin/mahasiswa/search', [MahasiswaController::class, 'search'])->name('admin.mahasiswa.search');

                Route::get('/admin/mahasiswa/export/all', [MahasiswaController::class, 'export_all'])->name('admin.mahasiswa.export.all');
                Route::get('/admin/mahasiswa/export/user', [MahasiswaController::class, 'export_user'])->name('admin.mahasiswa.export.user');
                Route::get('/admin/mahasiswa/export/admin', [MahasiswaController::class, 'export_admin'])->name('admin.mahasiswa.export.admin');
                Route::get('/admin/mahasiswa/export/user_unvote', [MahasiswaController::class, 'export_user_unvote'])->name('admin.mahasiswa.export.user_unvote');
                Route::get('/admin/mahasiswa/export/user_voted', [MahasiswaController::class, 'export_user_voted'])->name('admin.mahasiswa.export.user_voted');

                Route::get('/admin/kandidat', [KandidatController::class, 'index'])->name('admin.kandidat.index');
                Route::get('/admin/kandidat/create', [KandidatController::class, 'create'])->name('admin.kandidat.create');
                Route::post('/admin/kandidat/create', [KandidatController::class, 'store'])->name('admin.kandidat.store');
                Route::get('/admin/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('admin.kandidat.edit');
                Route::post('/admin/kandidat/update/{id}', [KandidatController::class, 'update'])->name('admin.kandidat.update');
                Route::get('/admin/kandidat/show/{id}', [KandidatController::class, 'show'])->name('admin.kandidat.show');
                Route::delete('/admin/kandidat/destroy/{id}', [KandidatController::class, 'destroy'])->name('admin.kandidat.destroy');

                Route::get('/admin/setting/', [AdminController::class, 'setting'])->name('admin.setting.index');
                Route::post('/admin/setting/enable/{id}', [AdminController::class, 'enable'])->name('admin.setting.enable');
                Route::post('/admin/setting/disable/{id}', [AdminController::class, 'disable'])->name('admin.setting.disable');

                Route::post('/kirimemail/{id}', [MahasiswaController::class, 'sendmail'])->name('mail.send');
            }
        );
    }
);
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
});
