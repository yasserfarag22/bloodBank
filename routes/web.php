<?php

use App\Http\Controllers\Admin\AdminControler;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AdminControler::class, 'index']);
    
    Route::resource('categories', CategoryController::class);
    Route::resource('governorates', GovernorateController::class);
    Route::resource('posts', PostController::class);
    Route::resource('cities', CityController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('status/{id}', [ClientController::class, 'toggleStatus'])->name('client.toggleStatus');

    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('contacts/{id}', [ContactController::class, 'delete'])->name('contacts.delete');
    Route::get('donations', [DonationController::class, 'index'])->name('donations.index');
   
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
