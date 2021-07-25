<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;



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

//Clear Cache Command
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return "Cache is cleared"; 
});

Route::match(['get', 'post'],'/', [UsersController::class,'signUp']);
Route::match(['get', 'post'],'/signup', [UsersController::class,'signUp']);


Route::post('api/fetch-states', [UsersController::class, 'fetchState']);
Route::post('api/fetch-cities', [UsersController::class, 'fetchCity']);

Route::match(['get', 'post'],'/signin', [UsersController::class,'signIn']);

Route::match(['get', 'post'],'/login', [UsersController::class,'login']);


