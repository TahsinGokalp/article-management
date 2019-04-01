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
    //Authors
    Route::get('authors', 'AuthorController@index')->name('authors');
    Route::get('authors-add', 'AuthorController@add')->name('authors.add');
    Route::post('authors-add', 'AuthorController@save')->name('authors.save');
    Route::get('authors-edit/{id}', 'AuthorController@edit')->name('authors.edit');
    Route::post('authors-edit/{id}', 'AuthorController@update')->name('authors.update');
    Route::get('authors-delete/{id}', 'AuthorController@delete')->name('authors.delete');
});
