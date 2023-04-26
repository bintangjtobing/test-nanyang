<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'webController@index');
Route::prefix('process')->group(function () {
    Route::POST('/new/member', 'webController@newMember');
    Route::POST('/new/downline/{id}', 'webController@newDownline');
    Route::GET('/get/member/{id}', 'webController@getMember');
    Route::GET('/delete/member/{id}', 'webController@deleteMember');
    Route::GET('/search', 'webController@search');
});
