<?php
Route::group(['middleware' => 'web', 'namespace' => 'Modules\Role\Http\Controllers'], function()
{
    Route::resource('role', 'RoleController');
});