<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ResoAnnouncementController;
use App\Http\Controllers\OrderAnnouncementController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/reso_announcement', function () {
//     return view('admin.reso_announcement');
// })->middleware(['auth', 'verified'])->name('reso_announcement');

// Route::get('/order_announcement', function () {
//     return view('admin.order_announcement');
// })->middleware(['auth', 'verified'])->name('order_announcement');



Route::middleware('auth')->group(function () {
    Route::get('/memo_announcement', [AnnouncementController::class, 'announcement'])->name('memo_announcement');
});

Route::middleware('auth')->group(function () {
    Route::get('/order_announcement', [OrderAnnouncementController::class, 'announcement'])->name('order_announcement');
});

Route::middleware('auth')->group(function () {
    Route::get('/reso_announcement', [ResoAnnouncementController::class, 'announcement'])->name('reso_announcement');
});

Route::get('/member', function () {
    return view('admin.member');
})->middleware(['auth', 'verified'])->name('member');

Route::get('/report', function () {
    return view('admin.report');
})->middleware(['auth', 'verified'])->name('report');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/upload', [AnnouncementController::class, 'showForm'])->name('upload.form');
    Route::post('/upload', [AnnouncementController::class, 'uploadFile'])->name('upload');

    Route::get('/download/{file}', [AnnouncementController::class, 'download']);
    
    Route::get('/delete/{id}', [AnnouncementController::class, 'delete'])->name('delete');
    Route::get('/search', [AnnouncementController::class, 'search'])->name('search');
});
Route::middleware('auth')->group(function () {
    Route::get('/upload_order', [OrderAnnouncementController::class, 'showForm'])->name('upload.form');
    Route::post('/upload_order', [OrderAnnouncementController::class, 'uploadFile'])->name('upload_order');
    Route::get('/download_order/{file}', [OrderAnnouncementController::class, 'download_order']);
    Route::get('/delete_order/{id}', [OrderAnnouncementController::class, 'delete'])->name('delete_order');
    Route::get('/search_order', [OrderAnnouncementController::class, 'search'])->name('search_order');
});
Route::middleware('auth')->group(function () {
    Route::get('/upload_reso', [ResoAnnouncementController::class, 'showForm'])->name('upload.form');
    Route::post('/upload_reso', [ResoAnnouncementController::class, 'uploadFile'])->name('upload_reso');
    Route::get('/download_reso/{file}', [ResoAnnouncementController::class, 'download_reso']);
    Route::get('/delete_reso/{id}', [ResoAnnouncementController::class, 'delete'])->name('delete_reso');
    Route::get('/search_reso', [ResoAnnouncementController::class, 'search'])->name('search_reso');
});
require __DIR__.'/auth.php';
