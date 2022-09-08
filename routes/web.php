<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('testing', function(Request $req){
    $blogs =  Blog::with('user')->get();
    return $blogs;
});

Route::get('', [BlogController::class, 'stream'])
->name('home');


Route::get('/signin', function () {
    return view('pages.sign_in');
})
->middleware('guest')
->name('login');


Route::get('/signup', function () {
    return view('pages.sign_up');
})
->middleware('guest');







/* 
Email verification
*/
Route::prefix('email')->group(function () {
    Route::get('verify-email',[ EmailVerificationController::class, 'showVerificationNotice'])
    ->middleware('auth')
    ->name('verification.notice');

    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

    Route::post('verification-notification', [EmailVerificationController::class, 'sendVerification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
});

/* 
User
*/
Route::prefix('user')->group(function () {

    Route::post('register', [UserController::class, 'register']);

    Route::get('logout', [UserController::class, 'logout']);

    Route::post('login', [UserController::class, 'login']);
});

/* 
Blog
*/
Route::resource('blog', BlogController::class);


/* 
Like
*/
Route::prefix('like')->group(function () {

    Route::post('', [LikeController::class, 'store'])->middleware('auth', 'verified');

    Route::delete('{blog_id}/{user_id}', [LikeController::class, 'destroy'])->middleware('auth', 'verified');

});