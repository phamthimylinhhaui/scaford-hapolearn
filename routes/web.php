<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ProfileController;

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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('courses', CourseController::class)->only(['index', 'show']);

Route::resource('tags', TagController::class)->only(['show']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user_course', UserCourseController::class)->only(['store'])->middleware(['canJoin']);
    Route::resource('user_course', UserCourseController::class)->only(['destroy']);
    Route::resource('lessons', LessonController::class)->only(['show']);
    Route::resource('reviews', ReviewController::class)->only(['store'])->middleware(['canReview']);
    Route::resource('reviews', ReviewController::class)->only(['update']);
    Route::resource('replies', ReplyController::class)->only(['store'])->middleware(['canReply']);
    Route::resource('replies', ReplyController::class)->only(['update']);
    Route::resource('replies', ReplyController::class)->only(['destroy']);
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});
