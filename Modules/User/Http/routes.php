<?php

Route::group(['middleware' => 'web',  'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::resource('user', 'UserController');
});
