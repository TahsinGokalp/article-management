<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tahsin Gökalp Şaan',
            'email' => 'tahsinsaan@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
