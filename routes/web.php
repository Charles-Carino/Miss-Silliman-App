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
    return redirect('/welcome');
});

Route::get('/tabulations_specialProjects', function () {
    return view('tabulations.tSP');
});

Route::get('/tabulations_speech', function () {
    return view('tabulations.tSpeech');
});
Route::get('/tabulations_talent', function () {
    return view('tabulations.tTalent');
});
Route::get('/login', function () {
    return view('login.login');
});
Route::get('/welcome', 'JudgesController@show');
Route::get('/maintenance','OrganizersController@show');
Route::post('/addTalentScores','JudgesController@addScores');
Route::post('/addJudge','UserController@addJudge');
// Route::post('/addUser','UserController@addOrganizer');
//
// Route::get('/signin',function(){
//   // echo('Confirmed!');
//   return redirect('/');
// });
