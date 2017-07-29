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
        User::Create([
            'google_id' => '0',
            'name' => 'Jean Patrick',
            'email' => 'bde@ensc.fr',
            'avatar' => 'http://lorempixel.com/600/600/cats/',
        ]);
    }
}
