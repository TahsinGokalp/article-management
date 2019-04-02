<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public const TAG_ADD = 1;

    public const TAG_EDIT = 2;

    public const TAG_DELETE = 3;

    public const AUTHOR_ADD = 4;

    public const AUTHOR_EDIT = 5;

    public const AUTHOR_DELETE = 6;

    public const LANGUAGE_ADD = 4;

    public const LANGUAGE_EDIT = 5;

    public const LANGUAGE_DELETE = 6;

    public const ARTICLE_ADD = 7;

    public const ARTICLE_EDIT = 8;

    public const ARTICLE_DELETE = 9;

    protected $fillable = ['type', 'user_id', 'item_id'];
}
