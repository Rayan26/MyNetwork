<?php

use App\Mail\NewUserWelcome;
use Illuminate\Support\Facades\Auth;
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

//modif inutil
/*Route::get('/', function () {
    $id = strval(auth()->user()->id);
    return view('welcome',  ['user' => $id]);
    return view('welcome');

}); */



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/email', function () {
    return new NewUserWelcome();
});


Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);


Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('profile.edit');



//Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
