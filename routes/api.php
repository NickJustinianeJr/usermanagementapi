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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('users', ['middleware' => 'cors', function () {
//     return 'UsersController@list';
// }]);

Route::group(['prefix' => 'users', 'middleware' => 'cors'], function() {
    Route::get('/', 'UsersController@list');
    Route::post('/', 'UsersController@createUser');

    Route::get('/{id}', 'UsersController@getUser');
    Route::put('/{id}', 'UsersController@updateUser');
    Route::delete('/{id}', 'UsersController@deleteUser');
});


// Route::get('/users',[UsersController::class, 'list']);