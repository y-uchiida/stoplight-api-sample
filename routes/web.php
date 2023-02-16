<?php

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

route::get('/posts', function() {
    return response()->json([], 200);
});

route::get('/posts/{post_id}', function() {
    return response()->json(['hoge' => 'fuga'], 200);
});

route::get('/users/{post_id}', function() {
    return response()->json([], 200);
});

route::get('/api/status', function () {
    return response()->json(
        ['status' => 'OK'],
        500
    );
});