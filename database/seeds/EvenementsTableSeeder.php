<?php

use Illuminate\Database\Seeder;

use App\Association;
// use App\Evenement;

class EvenementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $allAssos = Association::all();


        $allAssos->each(function($asso){
        	for ($i=0; $i < 10 ; $i++) { 
        		$asso->evenements()->save(factory(App\Evenement::class)->make());
        	}
        });
    }
}
