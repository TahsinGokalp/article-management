<?php

//Auth
Auth::routes(['register'=>false, 'verify'=>false]);
//Logged In
Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', 'HomeController@index')->name('home');
    //Tags
    Route::get('tags', 'TagController@index')->name('tags');
    Route::get('tags-add', 'TagController@add')->name('tags.add');
    Route::post('tags-add', 'TagController@save')->name('tags.save');
    Route::get('tags-edit/{id}', 'TagController@edit')->name('tags.edit');
    Route::post('tags-edit/{id}', 'TagController@update')->name('tags.update');
    Route::get('tags-delete/{id}', 'TagController@delete')->name('tags.delete');
});
