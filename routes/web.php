
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;
// Dashboard publik sebelum login
Route::view('/', 'dashboardlogin')->name('dashboardlogin');

// Halaman Tentang Saya
Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/storage/{path}', function (string $path) {
    $file = storage_path('app/public/' . $path);
    abort_unless(is_file($file), 404);
    return response()->file($file);
})->where('path', '.*');

Route::post('/undangan/{slug}/rsvp', [
    RsvpController::class,
    'store',
])->middleware('throttle:10,1')->name('rsvps.store');
// Halaman undangan publik
Route::get('/undangan/{slug}', [
    InvitationController::class,
    'show'
])->name('invitations.show');

// Halaman admin wajib login
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        // Daftar RSVP
Route::get('/rsvps', [
    AdminRsvpController::class,
    'index',
])->name('rsvps.index');
        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');

        // CRUD undangan
        Route::resource(
            'invitations',
            AdminInvitationController::class
        );
    });

// Halaman profil wajib login
Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');
});

// Autentikasi Laravel Breeze
require __DIR__.'/auth.php';