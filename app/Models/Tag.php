<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['text'];

    public function getArticleCountAttribute()
    {
        return $this->hasMany('\App\Models\ArticleTag', 'tag_id', 'id')->count();
    }
}
