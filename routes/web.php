<?php

use App\Http\Controllers\NewsletterController;
use  App\http\Controllers\PostController;
use  App\http\Controllers\UserController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::resource('posts', 'App\http\Controllers\PostController');
Route::get('profile', [PostController::class, 'myDashboard'])->name('blog.home');
Route::resource('users', 'App\http\Controllers\Auth\RegisteredUserController');
// Route::get('/users/create', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('users.create');

Route::get('/users', [UserController::class, 'index'])->name('blog.user');
Route::resource('customUser', 'App\http\Controllers\UserController');

Route::get('interface', [PostController::class, 'interface'])->name('blog.index');

Route::get('/email', function () {
    Mail::to('peaceoariyo@gmail.com')->send(new WelcomeMail);
    return new WelcomeMail();
});





//Route::get('/me', [PostController::class, 'index'])->name('post.index');