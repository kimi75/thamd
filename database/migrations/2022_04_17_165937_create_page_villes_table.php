<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_villes', function (Blueprint $table) {
          $table->id();
          $table->string('pays');
          $table->string('numero_departement', 3)->nullable();
          $table->string('ville_slug')->nullable();
          $table->string('ville_nom')->nullable();
          $table->string('ville_nom_simple')->nullable();
          $table->string('nom_commune')->nullable();
          $table->string('codes_postaux')->nullable();
          $table->integer('ville_population_2010')->nullable();
          $table->string('ville_longitude_deg')->nullable();
          $table->string('ville_latitude_deg')->nullable();
          $table->string('nom_region');
          $table->string('nom_departement');
          $table->string('departement_slug')->nullable();
          $table->integer('active_seo')->nullable();
          $table->string('url_page')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_villes');
    }
};
