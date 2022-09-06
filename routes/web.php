<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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
    return json_encode(User::find(Auth::user()->user_id));
});

Route::get('', function () {
    return redirect('signin');
});


Route::get('/signin', function () {
    return view('pages.sign_in');
})
->middleware('guest')
->name('login');


Route::get('/signup', function () {
    return view('pages.sign_up');
})
->middleware('guest');

Route::get('/home', function(){
    return redirect('/blog');
});





/* 
Email verification
*/
Route::prefix('email')->group(function () {
    Route::get('verify-email', function(){
        return view('auth.verify_email');
    })
    ->middleware('auth')
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


    Route::post('/verification-notification', function (Request $request) {
        $user = User::find(Auth::user()->user_id);
        $user->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

/* 
User
*/
Route::prefix('user')->group(function () {

    Route::post('register', [UserController::class, 'register']);

    Route::get('logout', [UserController::class, 'logout']);

    Route::post('login', [UserController::class, 'login']);
});

// Route::prefix('blog')->group(function () {
//     Route::get('', function () {
//         return view('pages.blog');
//     })
//     ->middleware('auth', 'verified');

//     // Route::resource()
// });

Route::resource('blog', BlogController::class)->middleware('auth');