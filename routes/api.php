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

/*
|----------------------------------------------------------------------------
| Users routers.
|----------------------------------------------------------------------------
 */
//Login user.
Route::post('login', 'v1\UserController@login')->middleware('cors');
Route::get('login', 'v1\UserController@details')->middleware(['cors', 'auth:api']);

/*
|----------------------------------------------------------------------------
| Commands routers.
|----------------------------------------------------------------------------
 */
// Get lists
Route::get('commands', 'v1\CommandController@list')->middleware(['cors', 'auth:api']);
// Create command.
Route::post('commands', 'v1\CommandController@create')->middleware(['cors', 'auth:api']);
// Get command by id.
Route::get('commands/{id}', 'v1\CommandController@view')->middleware(['cors', 'auth:api']);
// Update command by id.
Route::put('commands/{id}', 'v1\CommandController@update')->middleware(['cors', 'auth:api']);
// Delete command by id.
Route::delete('commands/{id}', 'v1\CommandController@update')->middleware(['cors', 'auth:api']);


