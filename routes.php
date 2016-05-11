<?php

Route::group(['namespace' => 'Appitized\Documentor\Http\Controllers'], function(){
    Route::get('api/documentation', 'DocumentorController@viewDocumentation');
});

