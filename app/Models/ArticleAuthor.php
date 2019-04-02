<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleAuthor extends Model
{
    protected $fillable = ['article_id', 'author_id'];

    public function author()
    {
        return $this->hasOne('\App\Models\Author', 'id', 'author_id');
    }
}
