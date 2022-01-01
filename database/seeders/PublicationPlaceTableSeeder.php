<?php

namespace Database\Seeders;

use App\Models\PublicationPlace;
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
        $item = new PublicationPlace();
        $item->text = 'YÖK';
        $item->save();

        $item = new PublicationPlace();
        $item->text = 'DergiPark';
        $item->save();
    }
}
