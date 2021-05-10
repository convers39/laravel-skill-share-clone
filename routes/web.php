<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseTeachingController;
use App\Http\Controllers\CourseSaveController;
use App\Http\Controllers\BookmarkController;

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

// user account and profile
Route::get('/accounts', [UserProfileController::class, 'index'])->name('account');
Route::get('/accounts/{name}', [UserProfileController::class, 'show'])->name('account.show');
Route::post('/accounts/{name}', [UserProfileController::class, 'update'])->name('account.update');

// course list and detail
Route::get('/browse/{category?}', [CourseController::class, 'index'])->name('course');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('course.show');

Route::post('/courses/{course}/bookmark', [BookmarkController::class, 'toggle'])->name('bookmark.toggle')->middleware(['auth']);

// saved courses
Route::middleware(['auth'])->group(function () {
    Route::get('/saved-courses', [CourseSaveController::class, 'index'])->name('bookmark');
    // Route::get('/saved-courses/{course}', [CourseSaveController::class, 'save'])->name('bookmark.save');
});
// course create and edit
Route::resource(
    'teaching',
    CourseTeachingController::class,
)->except(['store', 'show'])->parameters(['teaching' => 'course'])->middleware(['auth']);
Route::get('/teaching/{course}/preview', [CourseTeachingController::class, 'show'])->name('teaching.show');

// equivalent to below
// Route::get('/teaching', [CourseTeachingController::class, 'index'])->name('teaching');
// Route::get('/teaching/create', [CourseTeachingController::class, 'create'])->name('teaching.create');
// Route::post('/teaching', [CourseTeachingController::class, 'store'])->name('teaching.store');
// Route::get('/teaching/{course}/edit', [CourseTeachingController::class, 'edit'])->name('teaching.edit');
// Route::put('/teaching/{course}', [CourseTeachingController::class, 'update'])->name('teaching.update');
// Route::delete('/teaching/{course}', [CourseTeachingController::class, 'destroy'])->name('teaching.destroy');

Route::post('/teaching/{course}/upload', [UploadController::class, 'store']);
Route::delete('/teaching/{course}/revert', [UploadController::class, 'destroy']);
Route::patch('/teaching/{courseId}/publish', [CourseTeachingController::class, 'publish']);

Route::resource('videos', VideoController::class,)
    ->except(['store'])
    ->parameters(['videos' => 'videoId']);
