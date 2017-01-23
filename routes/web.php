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
    $users = DB::selectOne('select * from inha_sugang where subname = ?', ['회로이론']);
   
    return  view('ltehome', ['class' => $users->subname]);
});


Route::get('user',  'UserController@store');