<?php
//Auth
Auth::routes(['register'=>false,'verify'=>false]);
//Logged In
Route::middleware(['auth'])->group(function () {
    Route::get('/','HomeController@index')->name('home');
});
