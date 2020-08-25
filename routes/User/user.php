<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->namespace('Api\User')->group(function () {

    Route::post('update','UserController@update')->name('user-edit');
    
    // Route::prefix('custom-field')->group(function() {
    //     Route::post('/','CustomFieldController@fieldList')->name('custom-fields');
    //     Route::post('/update/{field}','CustomFieldController@update')->name('custom-fields-update');
    //     Route::post('/active-fields','CustomFieldController@getActiveFields')->name('active-custom-fields');
    // });


});

// Route::prefix('user')->namespace('Api\User')->group(function () {
//     Route::post('/verify-email','ForgotPasswordController@verifyEmail')->name('verify-email');
//     Route::post('/reset-password','ForgotPasswordController@resetPassword')->name('reset-password');
// });


