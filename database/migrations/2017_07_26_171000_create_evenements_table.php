<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('association_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->string('titre');
            $table->string('lieu');
            $table->date('dateDeb');
            $table->time('heureDeb')->nullable();
            $table->date('dateFin')->nullable();
            $table->time('heureFin')->nullable();
            $table->float('prix');
            $table->text('tarifs')->nullable();
            $table->text('description')->nullable();
            $table->string('affiche');
            $table->integer('nbMaxParticipants');
            $table->timestamps();
        });

        Schema::table('evenements', function($table) {
            $table->engine = 'InnoDB';

            $table->foreign('association_id')->references('id')->on('associations');
            $table->foreign('categorie_id')->references('id')->on('categorie_evenements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
}
