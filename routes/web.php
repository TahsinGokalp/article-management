<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleNoteController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PublicationPlaceController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth
Auth::routes(['register'=>false, 'verify'=>false]);
//Logged In
Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Tags
    Route::get('tags', [TagController::class, 'index'])->name('tags');
    Route::get('tags-add', [TagController::class, 'add'])->name('tags.add');
    Route::post('tags-add', [TagController::class, 'save'])->name('tags.save');
    Route::get('tags-edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
    Route::post('tags-edit/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::get('tags-merge/{id}', [TagController::class, 'merge'])->name('tags.merge');
    Route::post('tags-merge/{id}', [TagController::class, 'mergeSave'])->name('tags.mergeSave');
    Route::get('tags-delete/{id}', [TagController::class, 'delete'])->name('tags.delete');
    //Authors
    Route::get('authors', [AuthorController::class, 'index'])->name('authors');
    Route::get('authors-add', [AuthorController::class, 'add'])->name('authors.add');
    Route::post('authors-add', [AuthorController::class, 'save'])->name('authors.save');
    Route::get('authors-edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('authors-edit/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('authors-delete/{id}', [AuthorController::class, 'delete'])->name('authors.delete');
    //Languages
    Route::get('languages', [LanguageController::class, 'index'])->name('languages');
    Route::get('languages-add', [LanguageController::class, 'add'])->name('languages.add');
    Route::post('languages-add', [LanguageController::class, 'save'])->name('languages.save');
    Route::get('languages-edit/{id}', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::post('languages-edit/{id}', [LanguageController::class, 'update'])->name('languages.update');
    Route::get('languages-delete/{id}', [LanguageController::class, 'delete'])->name('languages.delete');
    //Publication Places
    Route::get('publication-places', [PublicationPlaceController::class, 'index'])->name('publicationPlaces');
    Route::get('publication-places-add', [PublicationPlaceController::class, 'add'])->name('publicationPlaces.add');
    Route::post('publication-places-add', [PublicationPlaceController::class, 'save'])->name('publicationPlaces.save');
    Route::get('publication-places-edit/{id}', [PublicationPlaceController::class, 'edit'])->name('publicationPlaces.edit');
    Route::post('publication-places-edit/{id}', [PublicationPlaceController::class, 'update'])->name('publicationPlaces.update');
    Route::get('publication-places-delete/{id}', [PublicationPlaceController::class, 'delete'])->name('publicationPlaces.delete');
    //Articles
    Route::get('articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('articles-add', [ArticleController::class, 'add'])->name('articles.add');
    Route::post('articles-add', [ArticleController::class, 'save'])->name('articles.save');
    Route::get('articles-edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('articles-edit/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('articles-delete/{id}', [ArticleController::class, 'delete'])->name('articles.delete');
    //Article Notes
    Route::get('article-notes/{article_id}', [ArticleNoteController::class, 'index'])->name('article.notes');
    Route::get('article-notes-add/{article_id}', [ArticleNoteController::class, 'add'])->name('article.notes.add');
    Route::post('article-notes-add/{article_id}', [ArticleNoteController::class, 'save'])->name('article.notes.save');
    Route::get('article-notes-edit/{article_id}/{id}', [ArticleNoteController::class, 'edit'])->name('article.notes.edit');
    Route::post('article-notes-edit/{article_id}/{id}', [ArticleNoteController::class, 'update'])->name('article.notes.update');
    Route::get('article-notes-delete/{id}', [ArticleNoteController::class, 'delete'])->name('article.notes.delete');
    //Stats
    Route::get('stats', [StatsController::class, 'index'])->name('stats');
});
