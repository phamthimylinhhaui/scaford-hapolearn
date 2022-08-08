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

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::resource('courses', CourseController::class)->only(['index', 'show']);

Route::resource('user_course', UserCourseController::class)->only(['store'])->middleware(['auth', 'canJoin']);
Route::resource('user_course', UserCourseController::class)->only(['update'])->middleware('auth');

Route::resource('lessons', LessonController::class)->only(['show'])->middleware('auth');

Route::resource('tags', TagController::class)->only(['show']);

Route::resource('reviews', ReviewController::class)->only(['store'])->middleware(['auth', 'canReview']);
Route::resource('reviews', ReviewController::class)->only(['update'])->middleware('auth');

Route::resource('replies', ReplyController::class)->only(['store'])->middleware(['auth', 'canReply']);
Route::resource('replies', ReplyController::class)->only(['update'])->middleware('auth');
