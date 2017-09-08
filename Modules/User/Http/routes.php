<?php

Route::group(['middleware' => ['web','auth'],  'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::resource('user', 'UserController');
});
