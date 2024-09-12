<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('reset-password', [AuthController::class, 'reset']);
    Route::post('new-password', [AuthController::class, 'newPassword']);
    Route::get('governorates', [MainController::class, 'governorates']);
    Route::get('cities', [MainController::class, 'cities']); 
    Route::get('categories', [MainController::class, 'categories']);
    Route::get('bloodTypes', [MainController::class, 'bloodTypes']);

    Route::group(['middleware' => 'auth:sanctum'], function() { 
        Route::get('posts', [MainController::class, 'posts']);
        Route::get('post', [MainController::class, 'post']);
        Route::post('post-toggle-favourite', [MainController::class, 'postFavourite']);
        Route::get('my-favourites', [MainController::class, 'myFavourites']);
        Route::post('donation-request/create', [MainController::class, 'donationRequestCreate']);
        Route::post('contacts', [MainController::class, 'contactUs']);
        Route::get('donation-requests', [MainController::class, 'donationRequests']);
        Route::get('donation-request', [MainController::class, 'donationRequest']);
        Route::get('notifications', [MainController::class, 'notifications']);
        Route::get('notifications-count', [MainController::class, 'notificationsCount']);
        Route::get('settings', [MainController::class, 'settings']);

        Route::get('notifications-settings', [AuthController::class, 'notificationsSettings']);
        Route::post('profile', [AuthController::class, 'profile']);
        Route::post('register-token', [AuthController::class, 'registerToken']);
        Route::post('remove-token', [AuthController::class, 'removeToken']);
    });
});
