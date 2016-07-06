<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phone', function () {
	return Response::view("smartphone", ["info" => app()->make('Smartphone')->getInfo()]);
});

Route::get('/shorten', function () {
	$data = Bitly::shorten("https://github.com/lenchv/binarstudio_hometasks");
	return Response::view("link", ["data" => $data['data']['url']]);
});