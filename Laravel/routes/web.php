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

Route::get('/msisdn', function () {
    return view('index');
});



Route::get('/extract', function () {
	$name = 'simona'; 
	$country = DB::select('select * from country');
	$mno = DB::select('select * from mobilenetworkoperator');
    return view('extract')->with(compact('country','mno','name'));
});