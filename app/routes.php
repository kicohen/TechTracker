<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function(){
    if(!Sentry::getUser()) {
        return Redirect::route('sessions.create');
    }elseif(Sentry::getUser()){
        return Redirect::route('attendances.index');
    }
});

Route::post('sessions', ['uses' => 'SessionsController@store', 'as' => 'sessions.store']);
Route::get('sessions/create', ['uses' => 'SessionsController@create', 'as' => 'sessions.create']);
Route::get('sessions/destroy',['uses' => 'SessionsController@destroy', 'as' => 'sessions.destroy']);

if(Config::get('system.attendance') == true){
    Route::resource('attendances', 'AttendancesController');
    Route::get('attendances/approve/{id}', ['uses' => 'AttendancesController@approve', 'as' => 'attendances.approve']);
}
Route::resource('groups', 'GroupsController');
Route::resource('users', 'UsersController');
Route::resource('inventories', 'InventoriesController');
Route::resource('repairs', 'RepairsController');
Route::resource('events', 'EventsController');

Route::post('roles', ['uses' => 'RolesController@store', 'as' => 'roles.store']);
Route::get('roles/{roles}', 'RolesController@destroy');

Route::post('dates', ['uses' => 'DatesController@store', 'as' => 'dates.store']);
Route::post('locations', ['uses' => 'LocationsController@store', 'as' => 'locations.store']);
Route::post('attachments', ['uses' => 'AttachmentsController@store', 'as' => 'attachments.store']);
Route::post('comments', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);

Route::get('{id}', function(){ return Redirect::route('sessions.create'); });