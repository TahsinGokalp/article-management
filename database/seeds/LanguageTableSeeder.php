<?php

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
        $item = new \App\Models\Language();
        $item->text = 'Türkçe';
        $item->save();

        $item = new \App\Models\Language();
        $item->text = 'İngilizce';
        $item->save();
    }
}
