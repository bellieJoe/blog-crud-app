<?php

use App\Http\Controllers\UserController;
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

Route::get('', function () {
    return redirect('signin');
});


Route::get('/signin', function () {
return view('pages.sign_in');
})->name('login');


Route::get('/signup', function () {
    return view('pages.sign_up');
});

Route::get('/blog', function () {
    return view('pages.blogs');
})->middleware('auth', 'verified');


/* 
Email verification
*/
Route::prefix('email')->group(function () {
    Route::get('verify-email', function(){
        return view('auth.verify_email');
    })
    // ->middleware('auth')
    ->name('verification.notice');

    Route::get('verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/blog');
    })
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

    Route::post('verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});

Route::prefix('user')->group(function () {

    Route::post('register', [UserController::class, 'register']);

    Route::get('logout', [UserController::class, 'logout']);
});