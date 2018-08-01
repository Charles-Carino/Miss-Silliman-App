<?php

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

Route::get('/tSP', function () {
    return view('tSP');
});

Route::get('/login', function () {
    return view('Login.login');
});

Route::post('/signin', function () {
    return view('welcome');
});

Route::get('/maintenance',function(){
  return view('maintenance.mCandidates');
});
