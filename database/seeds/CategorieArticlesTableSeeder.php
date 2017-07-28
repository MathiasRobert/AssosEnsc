<?php

use Illuminate\Database\Seeder;
use App\CategorieArticle;

class CategorieArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieArticle::Create([
            'nom' => 'EVENEMENT'
        ]);

        CategorieArticle::Create([
            'nom' => 'VIE DE L\'ECOLE'
        ]);

        CategorieArticle::Create([
            'nom' => 'INFOS'
        ]);

        CategorieArticle::Create([
            'nom' => 'DIVERS'
        ]);

        CategorieArticle::Create([
            'nom' => 'IMPORTANT'
        ]);
    }
}
