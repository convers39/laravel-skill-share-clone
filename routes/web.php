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

// course list and detail
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('course');
Route::get('/courses/{course}/{slug}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
// user account
Route::get('/accounts', [UserProfileController::class, 'index'])->name('account');
Route::get('/accounts/{name}', [UserProfileController::class, 'show'])->name('account.show');
Route::post('/accounts/{name}', [UserProfileController::class, 'update'])->name('account.update');
