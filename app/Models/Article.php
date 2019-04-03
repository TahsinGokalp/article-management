<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public const MSC = [
        'id' => 1,
        'text' => 'Yüksek Lisans Tezi',
    ];

    public const PHD = [
        'id' => 2,
        'text' => 'Doktora Tezi',
    ];

    public const ARTICLE = [
        'id' => 3,
        'text' => 'Makale',
    ];

    public const BOOK = [
        'id' => 4,
        'text' => 'Kitap',
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
