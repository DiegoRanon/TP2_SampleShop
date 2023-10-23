<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

  Route::get('/apropos', function () {
    return view('apropos');
});  


Route::controller(ArticleController::class)->group(function () {
   // Route::resource('articles',ArticleController::class);
  
      Route::get('/', 'index');
      Route::get('/article/create', 'create');
      Route::get('/article/{id}', 'show');
      Route::get('/article/{id}/edit', 'edit');
      //Route::get('/article/apropos', 'apropos');
  
      Route::post('/article', 'store');
      Route::patch('/article/{id}', 'update');
      Route::delete('/article/{id}', 'destroy');
    
  
  });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
// email verification route
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
  // This route can only be accessed by confirmed users...
})->middleware('verified');
*/