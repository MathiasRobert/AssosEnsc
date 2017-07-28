<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AssociationsTableSeeder::class);
        $this->call(CategorieArticlesTableSeeder::class);
        $this->call(CategorieEvenementsTableSeeder::class);
        factory(App\Article::class, 50)->make();
    }
}
