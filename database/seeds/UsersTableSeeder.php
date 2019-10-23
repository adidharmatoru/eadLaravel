<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Adidharma Torutama',
            'email' => 'adidharmatoru@gmail.com',
            'password' => Hash::make('hahahehe'),
            'title' => 'Kordas',
            'description' => 'Huehueue',
            'url' => 'https://adidharmatoru.artcart.id',
            'image' => 'uploads/TOR.jpg'
        ]);
    }
}
