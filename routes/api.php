<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Login user.
Route::post('login', 'v1\UserController@login')->middleware('cors');

// Get lists
Route::get('command', 'v1\CommandController@list')->middleware(['cors', 'auth:api']);
// Create command.
Route::post('command', 'v1\CommandController@create')->middleware(['cors', 'auth:api']);
// Get command by id.
Route::get('command/{id}', 'v1\CommandController@view')->middleware(['cors','auth:api']);
// Update command by id.
Route::put('command/{id}', 'v1\CommandController@update')->middleware(['cors','auth:api']);
// Delete command by id.
Route::delete('command/{id}', 'v1\CommandController@update')->middleware(['cors','auth:api']);


