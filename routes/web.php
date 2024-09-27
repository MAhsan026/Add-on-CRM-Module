<?php

use App\Http\Controllers\FollowupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('sigin', [RegisterationController::class, 'login'])->name('sigin');
Route::get('signup', [RegisterationController::class, 'Register'])->name('signup');
Route::POST('store', [RegisterationController::class, 'store'])->name('register.store');
Route::POST('check/sigin', [RegisterationController::class, 'check'])->name('signin.check');
route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
route::prefix('contact')->middleware('auth.middleware')->group(function () {
    route::get('list', [HomeController::class, 'contactList'])->name('contact.list');

    route::get('create', [HomeController::class, 'create'])->name('contact.create');
    route::post('store', [HomeController::class, 'store'])->name('contact.store');
    route::get('edit/{id}', [HomeController::class, 'edit'])->name('edit');
    route::post('update/{id}', [HomeController::class, 'update'])->name('contact.update');
    route::get('delete/{id}', [HomeController::class, 'delete'])->name('delete');
});
route::prefix('followup')->middleware('auth.middleware')->group(function () {
    route::get('create', [FollowupController::class, 'create'])->name('followup.create');
    route::post('store', [FollowupController::class, 'store'])->name('followup.store');
    route::get('list', [FollowupController::class, 'list'])->name('followup.list');
    route::get('edit/{id}', [FollowupController::class, 'edit'])->name('followup.edit');
    route::post('update/{id}', [FollowupController::class, 'update'])->name('followup.update');
    route::get('delete/{id}', [FollowupController::class, 'delete'])->name('followup.delete');
});
route::prefix('reminder')->middleware('auth.middleware')->group(function () {
    route::get('admin', [FollowupController::class, 'reminder_admin'])->name('reminder.admin');
    route::post('admin/email', [FollowupController::class, 'reminder_admin_email'])->name('admin.email');
    route::post('before/followup/email', [FollowupController::class, 'reminder_admin_email'])->name('admin.before');
});
