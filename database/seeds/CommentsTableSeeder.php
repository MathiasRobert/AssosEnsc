<?php

use Illuminate\Database\Seeder;

use App\Evenement;
use App\Article;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evenement::all()->each(function($event){
        	for ($i=0; $i < 5 ; $i++) { 
        		$event->comments()->save(factory(App\Comment::class)->make());
        	}
        });

        Article::all()->each(function($article){
        	for ($i=0; $i < 5 ; $i++) { 
        		$article->comments()->save(factory(App\Comment::class)->make());
        	}
        });
    }
}
