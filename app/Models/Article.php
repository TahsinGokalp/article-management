<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public const THESIS = [
        'id' => 1,
        'text' => 'Tez',
    ];

    public const ARTICLE = [
        'id' => 2,
        'text' => 'Makale',
    ];

    protected $fillable = ['title', 'type', 'abstract', 'file', 'language_id', 'added_by'];

    public function language()
    {
        return $this->hasOne('\App\Models\Language', 'id', 'language_id');
    }

    public function tags()
    {
        return $this->hasMany('\App\Models\ArticleTag', 'article_id', 'id');
    }

    public function authors()
    {
        return $this->hasMany('\App\Models\ArticleAuthor', 'article_id', 'id');
    }
}
