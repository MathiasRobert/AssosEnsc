<?php

use Illuminate\Database\Seeder;
use App\CategorieEvenement;

class CategorieEvenementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieEvenement::Create([
            'nom' => 'SOIREE'
        ]);

        CategorieEvenement::Create([
            'nom' => 'WEEKEND'
        ]);

        CategorieEvenement::Create([
            'nom' => 'AUTRE ECOLE'
        ]);

        CategorieEvenement::Create([
            'nom' => 'SORTIE CULTURELLE'
        ]);

        CategorieEvenement::Create([
            'nom' => 'SORTIE SPORTIVE'
        ]);
    }
}
