<?php

use Illuminate\Database\Seeder;

class PublicationPlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $item = new \App\Models\PublicationPlace();
        $item->text = 'YÖK';
        $item->save();

        $item = new \App\Models\PublicationPlace();
        $item->text = 'DergiPark';
        $item->save();

    }
}
