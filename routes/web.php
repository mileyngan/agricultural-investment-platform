<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

// Route::get('/', 'LandingController@index');
Route ::get('/', [LandingController::class, 'index'])->name('welcome');

Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/firm', [FirmController::class, 'index'])->name('firm');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/firm/create/{id}', [FirmController::class, 'create'])->name('firm.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::middleware(['auth', 'role:investor'])->group(function () {
    Route::get('/investor/dashboard', [InvestorController::class, 'dashboard'])->name('investor.dashboard');
    Route::get('/investor/search', [InvestorController::class, 'search'])->name('investor.search');
    Route::get('/investor/project/{project}', [InvestorController::class, 'showProject'])->name('investor.project');
    Route::post('/investor/project/{project}', [InvestorController::class, 'invest'])->name('investor.invest');
    
    Route::get('/investor/wallet', [WalletController::class, 'show'])->name('investor.wallet');
    Route::post('/investor/wallet/deposit', [WalletController::class, 'deposit'])->name('investor.wallet.deposit');
    Route::post('/investor/wallet/withdraw', [WalletController::class, 'withdraw'])->name('investor.wallet.withdraw');
});

Route::middleware(['auth', 'role:firm'])->group(function () {
    Route::get('/firm/dashboard', [FirmController::class, 'dashboard'])->name('firm.dashboard');
    Route::get('/firm/project/create', [FirmController::class, 'createProject'])->name('firm.create_project');
    Route::get('/firm/projects      ', [FirmController::class, 'projects'])->name('firm.projects');
    Route::get('/firm/project/{project}', [FirmController::class, 'showProject'])->name('firm.show_project');
    Route::get('/firm/project/{project}/edit', [FirmController::class, 'editProject'])->name('firm.edit_project');
    Route::put('/firm/project/{project}', [FirmController::class, 'updateProject'])->name('firm.update_project');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/firmCreateForm', [FirmController::class, 'store'])->name('admin.firmCreateForm');
    Route::get('/admin/projects', [AdminController::class, 'manageProjects'])->name('admin.manage_projects');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manage_users');
    Route::post('/admin/project/{project}/approve', [AdminController::class, 'approveProject'])->name('admin.approve_project');
    Route::post('/admin/project/{project}/reject', [AdminController::class, 'rejectProject'])->name('admin.reject_project');
    Route::get('/admin/firms/manage', [AdminController::class, 'manageFirms'])->name('firms.manage');
    Route::get('/admin/firms/approve/{firm_id}', [AdminController::class, 'approveFirm'])->name('firms.approve');
Route::get('/admin/firms/reject/{firm_id}', [AdminController::class, 'rejectFirm'])->name('firms.reject');
   
    Route::get('/admin/manage', [AdminManagementController::class, 'index'])->name('admin.manage');
    Route::get('/admin/create', [AdminManagementController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminManagementController::class, 'store'])->name('admin.store');
});

});