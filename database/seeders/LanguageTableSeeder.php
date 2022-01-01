<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Language();
        $item->text = 'Türkçe';
        $item->save();

        $item = new Language();
        $item->text = 'İngilizce';
        $item->save();
    }
}
