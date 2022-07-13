<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
}) -> name('welcome');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class)->only(['index', 'show', 'edit', 'update'])->names(['index' => 'users.index', 'show' => 'users.show']);
    Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('follow');
    Route::delete('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('unfollow');
});
