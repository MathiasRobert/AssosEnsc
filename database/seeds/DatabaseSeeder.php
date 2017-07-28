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
        $this->call(AssociationsTableSeeder::class);
        $this->call(CategorieEvenementsTableSeeder::class);
        $this->call(EvenementsTableSeeder::class);
        $this->call(CategorieArticlesTableSeeder::class);
        
    }
}
