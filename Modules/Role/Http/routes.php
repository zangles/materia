<?php
Route::group(['middleware' => ['web','auth'], 'namespace' => 'Modules\Role\Http\Controllers'], function()
{
    Route::resource('role', 'RoleController');
});