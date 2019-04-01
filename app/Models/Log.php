<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public const TAG_ADD = 1;

    public const TAG_EDIT = 2;

    public const TAG_DELETE = 3;

    protected $fillable = ['type','user_id','item_id'];

}
