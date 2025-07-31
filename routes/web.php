<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\SODController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfografisController;   
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\KependudukanController;
// use App\Http\Controllers\SaranaDesaController;
// use App\Http\Controllers\WilayahDesaController;
use App\Http\Controllers\BudayaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route publik
Route::get('/xhqadmin765', function () {
    return view('auth.login');
})->name('login');
Route::post('/xhqadmin765', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profildesa', [HomeController::class, 'showProfil'])->name('profildesa');
Route::get('/umkm', [UMKMController::class, 'index']);
Route::get('/umkm/detail/{id}', [UMKMController::class, 'show'])->name('umkm.detail');
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/detail/{id}', [BlogController::class, 'show'])->name('blog.detail');
Route::get('/content', [ContentController::class, 'index']);
Route::get('/content/detail/{id}', [ContentController::class, 'show'])->name('content.detail');
Route::get('/sod', [SODController::class, 'index']);
Route::get('/sod/detail/{id}', [SODController::class, 'showDetail'])->name('sod.detail');
Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya.index');
Route::get('/budaya/detail/{id}', [BudayaController::class, 'showDetail'])->name('budaya.detail');
Route::get('/blog/kategori/{slug}', [HomeController::class, 'byCategory'])->name('blog.byCategory');
Route::get('/blog', [HomeController::class, 'blogIndex'])->name('blog.index');
Route::get('/kependudukan', [KependudukanController::class, 'index'])->name('kependudukan');
// Route::get('/sarana', [HomeController::class, 'showSarana'])->name('sarana');
// Route::get('/wilayah', [HomeController::class, 'showWilayah'])->name('wilayah');
Route::get('/infografis', [HomeController::class, 'showInfografis'])->name('infografis');
Route::get('/ppid', [HomeController::class, 'showPPID'])->name('ppid');
// Route::get('/infografis', [InfografisController::class, 'index'])->name('infografis');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route admin (hanya untuk admin, gunakan middleware 'auth' atau 'admin')
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('profil-desa', [ProfilDesaController::class, 'index'])->name('admin.profil_desa.index');
    Route::get('profil-desa/edit', [ProfilDesaController::class, 'edit'])->name('admin.profil_desa.edit');
    Route::post('profil-desa/update', [ProfilDesaController::class, 'update'])->name('admin.profil_desa.update');

    Route::get('footer', [FooterController::class, 'index'])->name('admin.footer.index');
    Route::get('footer/edit', [FooterController::class, 'edit'])->name('admin.footer.edit');
    Route::post('footer/update', [FooterController::class, 'update'])->name('admin.footer.update');
    Route::post('footer/kontak/add', [FooterController::class, 'addKontak'])->name('admin.footer.kontak.add');
    Route::get('footer/kontak/{id}/edit', [FooterController::class, 'editKontak'])->name('admin.footer.kontak.edit');
    Route::put('footer/kontak/{id}', [FooterController::class, 'updateKontak'])->name('admin.footer.kontak.update');
    Route::delete('footer/kontak/{id}', [FooterController::class, 'deleteKontak'])->name('admin.footer.kontak.delete');

    // Kependudukan Admin Routes
    Route::get('kependudukan', [KependudukanController::class, 'adminIndex'])->name('admin.kependudukan.index');
    Route::put('kependudukan/update-all', [KependudukanController::class, 'updateAll'])->name('admin.kependudukan.updateAll');
    Route::get('kependudukan/create', [KependudukanController::class, 'create'])->name('admin.kependudukan.create');
    Route::post('kependudukan/store', [KependudukanController::class, 'store'])->name('admin.kependudukan.store');
    Route::get('kependudukan/{id}/edit', [KependudukanController::class, 'edit'])->name('admin.kependudukan.edit');
    Route::put('kependudukan/{id}', [KependudukanController::class, 'update'])->name('admin.kependudukan.update');
    Route::delete('kependudukan/{id}', [KependudukanController::class, 'destroy'])->name('admin.kependudukan.destroy');

    // Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Blog
    // Route::get('/blog', [BlogController::class, 'adminIndex'])->name('admin.blog.index');
    // Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    // Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
    // Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    // Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    // Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

    // Content
    Route::get('/content', [ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    // Route::get('/test-log', function() {
        // file_put_contents(storage_path('logs/debug.log'), "Test route hit\n", FILE_APPEND);
        // \Log::info('Test route hit');
        // return 'Test logged';
    // });

    Route::get('/test-footer', function() {
        $footer = \App\Models\Footer::with('kontak')->first();
        return response()->json([
            'footer' => $footer,
            'kontak_count' => $footer ? $footer->kontak->count() : 0,
            'kontak_data' => $footer ? $footer->kontak : []
        ]);
    });

    Route::post('/content/store', function(\Illuminate\Http\Request $request) {
        // file_put_contents(storage_path('logs/debug.log'), "Route hit: admin.content.store\n", FILE_APPEND);
        // \Log::info('Route hit: admin.content.store');
        // \Log::info('Request data in route:', $request->all());
        return app(\App\Http\Controllers\ContentController::class)->store($request);
    })->name('admin.content.store');
    Route::get('/admin/content/edit/{id}', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/admin/content/update/{id}', [ContentController::class, 'update'])->name('admin.content.update');
    Route::delete('/content/delete/{id}', [ContentController::class, 'destroy'])->name('admin.content.delete');
    Route::get('/content/detail/{id}', [ContentController::class, 'show'])->name('admin.content.detail');
    Route::put('/content/toggle/{id}', [ContentController::class, 'toggle'])->name('admin.content.toggle');

    // UMKM
    // Route::get('/umkm', [UMKMController::class, 'adminIndex'])->name('admin.umkm.index');
    // Route::get('/umkm/create', [UMKMController::class, 'create'])->name('admin.umkm.create');
    // Route::post('/umkm/store', [UMKMController::class, 'store'])->name('admin.umkm.store');
    // Route::get('/umkm/edit/{id}', [UMKMController::class, 'edit'])->name('admin.umkm.edit');
    // Route::put('/umkm/update/{id}', [UMKMController::class, 'update'])->name('admin.umkm.update');
    // Route::delete('/umkm/delete/{id}', [UMKMController::class, 'destroy'])->name('admin.umkm.delete');

    // SOD
    Route::get('/sod', [SODController::class, 'adminIndex'])->name('admin.sod.index');
    Route::get('/sod/create', [SODController::class, 'create'])->name('admin.sod.create');
    Route::post('/sod/store', [SODController::class, 'store'])->name('admin.sod.store');
    Route::get('/sod/edit/{id}', [SODController::class, 'edit'])->name('admin.sod.edit');
    Route::put('/sod/update/{id}', [SODController::class, 'update'])->name('admin.sod.update');
    Route::delete('/sod/delete/{id}', [SODController::class, 'destroy'])->name('admin.sod.delete');
    Route::get('/sod/detail/{id}', [SODController::class, 'show'])->name('admin.sod.detail');
    Route::put('/sod/toggle/{id}', [SODController::class, 'toggle'])->name('admin.sod.toggle');
});

// UMKM
Route::prefix('admin/umkm')->middleware(['auth'])->group(function () {
    Route::get('/', [UMKMController::class, 'adminIndex'])->name('admin.umkm.index');
    Route::get('/show/{id}', [UMKMController::class, 'adminShow'])->name('admin.umkm.show');
    Route::get('/create', [UMKMController::class, 'create'])->name('admin.umkm.create');
    Route::post('/store', [UMKMController::class, 'store'])->name('admin.umkm.store');
    Route::get('/edit/{id}', [UMKMController::class, 'edit'])->name('admin.umkm.edit');
    Route::put('/update/{id}', [UMKMController::class, 'update'])->name('admin.umkm.update');
    Route::delete('/delete/{id}', [UMKMController::class, 'destroy'])->name('admin.umkm.delete');
    Route::get('/detail/{id}', [UMKMController::class, 'adminShow'])->name('admin.umkm.detail');
    Route::put('/toggle/{id}', [UMKMController::class, 'toggle'])->name('admin.umkm.toggle');
});

Route::prefix('admin/blog')->middleware(['auth'])->group(function () {
    Route::get('/', [BlogController::class, 'adminIndex'])->name('admin.blog.index');
    Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
    Route::get('/detail/{id}', [BlogController::class, 'adminShow'])->name('admin.blog.detail');
    Route::put('/toggle/{id}', [BlogController::class, 'toggle'])->name('admin.blog.toggle');
});

Route::prefix('admin/budaya')->middleware(['auth'])->group(function () {
    Route::get('/', [BudayaController::class, 'indexAdmin'])->name('admin.budaya.index');
    Route::get('/create', [BudayaController::class, 'create'])->name('admin.budaya.create');
    Route::post('/store', [BudayaController::class, 'store'])->name('admin.budaya.store');
    Route::get('/{id}/edit', [BudayaController::class, 'edit'])->name('admin.budaya.edit');
    Route::put('/{id}', [BudayaController::class, 'update'])->name('admin.budaya.update');
    Route::get('/{id}', [BudayaController::class, 'show'])->name('admin.budaya.show');
    Route::delete('/{id}', [BudayaController::class, 'destroy'])->name('admin.budaya.destroy');
    Route::put('/{id}/toggle', [BudayaController::class, 'toggle'])->name('admin.budaya.toggle');
});
// Admin Kependudukan routes sudah ada di atas dalam middleware auth group