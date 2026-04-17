<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BrowseJobController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\PostJobController;

// Route::permanentRedirect('/', '/login');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/setup-profile', [ApplicationController::class, 'create'])->name('profile.create');
    Route::post('/setup-profile', [ApplicationController::class, 'store'])->name('profile.store');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
});

Route::middleware(['auth', 'role:applicant'])->prefix('applicant')->name('applicant.')->group(function () {
    Route::get('dashboard', [ApplicantController::class, 'index'])->name('dashboard');
    Route::get('browse-jobs', [BrowseJobController::class, 'index'])->name('browse-jobs');
    
});

Route::middleware(['auth', 'role:employer'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('dashboard', [EmployerController::class, 'index'])->name('dashboard');
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('companyProfile');
    Route::get('post-jobs', [PostJobController::class, 'index'])->name('postJob');

    Route::get('/company/edit', [CompanyProfileController::class, 'edit'])->name('edit');
    Route::patch('/company/banner/update', [CompanyProfileController::class, 'updateBanner'])->name('updateBanner');
    Route::patch('/company/update', [CompanyProfileController::class, 'update'])->name('update');
    Route::patch('/company/logo/update', [CompanyProfileController::class, 'updateLogo'])->name('updateLogo');
    Route::patch('/company/logo/update', [CompanyProfileController::class, 'updateLogo'])->name('updateLogo');
    Route::post('/companies/{company}/photos', [CompanyProfileController::class, 'uploadPhotos'])->name('company.photos.uploadPhotos');
    
});

require __DIR__.'/auth.php';
