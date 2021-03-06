<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(
    [
        'register' => false
    ]
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin
Route::group(['prefix'=>'admin','middleware'=>['auth']],
    function(){
        Route::get('buku',function (){
            return view('buku.index');
        });
        Route::get('pengarang', function (){
            return view('pengarang.index');
        });
    });