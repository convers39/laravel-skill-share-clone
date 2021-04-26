<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user account
Route::get('/account', [UserProfileController::class, 'index'])->name('account');
Route::get('/account/{name}', [UserProfileController::class, 'show'])->name('account.show');
Route::post('/account/{name}', [UserProfileController::class, 'update'])->name('account.update');
