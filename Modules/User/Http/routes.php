<?php

Route::group(['middleware' => 'web',  'namespace' => 'Modules\User\Http\Controllers'], function()
{
//    Route::get('/', 'UserController@index')->name('user');
    Route::resource('user', 'UserController');

});
