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
    Route::get('tags-merge/{id}', 'TagController@merge')->name('tags.merge');
    Route::post('tags-merge/{id}', 'TagController@mergeSave')->name('tags.mergeSave');
    Route::get('tags-delete/{id}', 'TagController@delete')->name('tags.delete');
    //Authors
    Route::get('authors', 'AuthorController@index')->name('authors');
    Route::get('authors-add', 'AuthorController@add')->name('authors.add');
    Route::post('authors-add', 'AuthorController@save')->name('authors.save');
    Route::get('authors-edit/{id}', 'AuthorController@edit')->name('authors.edit');
    Route::post('authors-edit/{id}', 'AuthorController@update')->name('authors.update');
    Route::get('authors-delete/{id}', 'AuthorController@delete')->name('authors.delete');
    //Languages
    Route::get('languages', 'LanguageController@index')->name('languages');
    Route::get('languages-add', 'LanguageController@add')->name('languages.add');
    Route::post('languages-add', 'LanguageController@save')->name('languages.save');
    Route::get('languages-edit/{id}', 'LanguageController@edit')->name('languages.edit');
    Route::post('languages-edit/{id}', 'LanguageController@update')->name('languages.update');
    Route::get('languages-delete/{id}', 'LanguageController@delete')->name('languages.delete');
    //Publication Places
    Route::get('publication-places', 'PublicationPlaceController@index')->name('publicationPlaces');
    Route::get('publication-places-add', 'PublicationPlaceController@add')->name('publicationPlaces.add');
    Route::post('publication-places-add', 'PublicationPlaceController@save')->name('publicationPlaces.save');
    Route::get('publication-places-edit/{id}', 'PublicationPlaceController@edit')->name('publicationPlaces.edit');
    Route::post('publication-places-edit/{id}', 'PublicationPlaceController@update')->name('publicationPlaces.update');
    Route::get('publication-places-delete/{id}', 'PublicationPlaceController@delete')->name('publicationPlaces.delete');
    //Articles
    Route::get('articles', 'ArticleController@index')->name('articles');
    Route::get('articles-add', 'ArticleController@add')->name('articles.add');
    Route::post('articles-add', 'ArticleController@save')->name('articles.save');
    Route::get('articles-edit/{id}', 'ArticleController@edit')->name('articles.edit');
    Route::post('articles-edit/{id}', 'ArticleController@update')->name('articles.update');
    Route::get('articles-delete/{id}', 'ArticleController@delete')->name('articles.delete');
    //Stats
    Route::get('stats', 'StatsController@index')->name('stats');
});
