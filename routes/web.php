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

    // ************ * categories * ************ 
    Route::middleware('permission:categories-list')->group(function () {
        Route::resource('categories', CategoryController::class);
    });

     // ************ * governorates * ************ 
    Route::middleware('permission:governorates-list')->group(function () {
        Route::resource('governorates', GovernorateController::class);
    });

   // ************ * posts * ************ 
    Route::middleware('permission:posts-list')->group(function () {
        Route::resource('posts', PostController::class);
    });

     // ************ * cities * ************ 
    Route::middleware('permission:cities-list')->group(function () {
        Route::resource('cities', CityController::class);
    });

  // ************ * settings * ************ 
    Route::middleware('permission:settings-list')->group(function () {
        Route::resource('settings', SettingController::class);
    });

    // ************ * clients * ************ 
    Route::middleware('permission:clients-list')->group(function () {
        Route::resource('clients', ClientController::class);
    });
   // ************ * Users * ************ 
    Route::middleware('permission:users-list')->group(function () {
        Route::resource('users', UserController::class);
    });

    // ************ * Roles * ************ 
    Route::middleware('permission:roles-list')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // ************ * toggleStatus * ************ 
    Route::middleware('permission:clients-edit')->group(function () {
        Route::get('status/{id}', [ClientController::class, 'toggleStatus'])->name('client.toggleStatus');
    });

     // ************ * toggleStatus * ************ 
    Route::middleware('permission:contacts-list')->group(function () {
        Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('contacts/{id}', [ContactController::class, 'delete'])->name('contacts.delete');
    });

     // ************ * donations * ************ 
    Route::middleware('permission:donations-list')->group(function () {
        Route::get('donations', [DonationController::class, 'index'])->name('donations.index');
    });

   
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
