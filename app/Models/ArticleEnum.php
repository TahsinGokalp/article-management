<?php

namespace App\Models;

class ArticleEnum
{
    //TODO : Bu class silinip diğer constant kullanılan yerler düzenlenecek
    //Geçici çözüm
    public const NEW = [
        'id'   => 0,
        'text' => 'Yeni',
    ];

    public const READ = [
        'id'   => 1,
        'text' => 'Okundu',
    ];
}
