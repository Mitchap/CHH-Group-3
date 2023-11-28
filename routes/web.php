<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ResoAnnouncementController;
use App\Http\Controllers\OrderAnnouncementController;
use App\Http\Controllers\MemberSideController;
use App\Http\Controllers\MemberSideResoController;
use App\Http\Controllers\MemberSideOrderController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProposalController;
use App\Mail\AnnouncementMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Members;
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

Route::get('/event', function () {return view('admin.event');
})->middleware(['auth', 'verified'])->name('event');


Route::middleware('auth')->group(function () {
    Route::get('/proposal_manager', [EventController::class, 'proposal_manager'])->name('proposal_manager');
    // Route::post('/store-event', [EventController::class, 'store'])->name('store.event');
    // Route::get('/event', [EventsController::class, 'event'])->name('event');

});


Route::middleware('auth')->group(function () {
    Route::get('/memo_announcement', [AnnouncementController::class, 'announcement'])->name('memo_announcement');
    Route::get('/order_announcement', [OrderAnnouncementController::class, 'announcement'])->name('order_announcement');
    Route::get('/reso_announcement', [ResoAnnouncementController::class, 'announcement'])->name('reso_announcement');
});

Route::middleware('auth')->group(function () {
    Route::get('/member', [MembersController::class, 'member'])->name('member');
    Route::get('/member/{member}/edit', [MembersController::class, 'edit']) ->name ('edit_member');
    Route::put('/member/{member}/update', [MembersController::class, 'update']) ->name ('update_member');
    Route::get('/member/{member}/view', [MembersController::class, 'view']) ->name ('view_member');
    Route::delete('/member/{member}/delete', [MembersController::class, 'delete']) ->name ('delete_member');


});

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
});

Route::middleware('auth')->group(function () {
    Route::get('/upload_order', [OrderAnnouncementController::class, 'showForm'])->name('upload.form');
    Route::post('/upload_order', [OrderAnnouncementController::class, 'uploadFile'])->name('upload_order');
    Route::get('/download_order/{file}', [OrderAnnouncementController::class, 'download_order']);
    Route::get('/delete_order/{id}', [OrderAnnouncementController::class, 'delete'])->name('delete_order');
});

Route::middleware('auth')->group(function () {
    Route::get('/upload_reso', [ResoAnnouncementController::class, 'showForm'])->name('upload.form');
    Route::post('/upload_reso', [ResoAnnouncementController::class, 'uploadFile'])->name('upload_reso');
    Route::get('/download_reso/{file}', [ResoAnnouncementController::class, 'download_reso']);
    Route::get('/delete_reso/{id}', [ResoAnnouncementController::class, 'delete'])->name('delete_reso');
});

Route::middleware('auth')->group(function () {

});


require __DIR__.'/auth.php';


// Member Portal Routes
Route::get('/events', [MemberSideController::class, 'event']) ->name ('events');
Route::get('/memo_announcements', [MemberSideController::class, 'memo_announcements']);
Route::get('/reso_announcements', [MemberSideResoController::class, 'reso_announcements']);
Route::get('/order_announcements', [MemberSideOrderController::class, 'order_announcements']);
Route::get('/proposal', [MemberSideController::class, 'proposal']);
Route::get('/registration', [MemberSideController::class, 'registration']) ->name ('registration');
Route::post('/submit', [MemberSideController::class, 'submit']) ->name ('submit');

//Route for mail
Route::get('/email', function() {
    $data = Members::all(); // Retrieve all records from your model

    foreach ($data as $record) {
        $email = $record->email;
        Mail::to($email)->send(new AnnouncementMail());
    }
    return 'Emails sent successfully!';
});