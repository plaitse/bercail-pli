<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Biens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titre')->nullable();
            $table->integer('prix')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('zip', 11)->nullable();
            $table->text('lien_ad')->nullable();
            $table->integer('lien_img')->nullable();
            $table->string('valid', 20)->nullable();
            $table->string('etat', 20)->nullable();
            $table->string('contact', 150)->nullable();
            $table->string('contactlbc', 150)->nullable();
            $table->string('tel', 30)->nullable();
            $table->string('email', 250)->nullable();
            $table->integer('area')->nullable();
            $table->text('descri')->nullable();
            $table->text('comment')->nullable();
            $table->text('daterap')->nullable();
            $table->integer('nbroom')->nullable();
            $table->integer('etage')->nullable();
            $table->text('adresse')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('trans', 20)->nullable();
            $table->string('nom', 200)->nullable();
            $table->string('prenom', 200)->nullable();
            $table->string('civ', 20)->nullable();
            $table->integer('taxe')->nullable();
            $table->integer('charges')->nullable();
            $table->string('timm', 300)->nullable();
            $table->string('iphone', 5)->nullable();
            $table->string('digi', 5)->nullable();
            $table->integer('jardin')->nullable();
            $table->integer('balc')->nullable();
            $table->integer('cave')->nullable();
            $table->integer('park')->nullable();
            $table->string('eau', 200)->nullable();
            $table->string('chauffage', 200)->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('sejour')->nullable();
            $table->string('transports', 300)->nullable();
            $table->string('lift', 5)->nullable();
            $table->tinyInteger('sdb')->nullable();
            $table->tinyInteger('sdo')->nullable();
            $table->string('nrj', 3)->nullable();
            $table->string('ges', 3)->nullable();
            $table->tinyInteger('etagemax')->nullable();
            $table->string('cuisine', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
