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

Route::get('/', 'BasicController@check');

Route::get('/home', function () {
    return view('home');
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
Route::post('/addScores','JudgesController@addScores');
Route::post('/addJudge','UserController@addJudge');
Route::post('/addOrganizer','UserController@addOrganizer');
Route::post('/Candidate','CandidatesController@createCandidate');
Route::post('/signin','BasicController@signIn');
Route::get('/logout', function(){
    auth()->logout();
    return redirect('/');
  });
Route::post('/saveCandidate','PrepageantsController@save');
