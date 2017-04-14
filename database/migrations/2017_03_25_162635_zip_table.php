<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Code_postal')->nullable();
            $table->string('INSEE_COM')->nullable();
            $table->string('NOM_COM')->nullable();
            $table->string('NOM_DEPT')->nullable();
            $table->string('NOM_REG')->nullable();
            $table->string('lct_id')->nullable();
            $table->string('lct_parent_id')->nullable();
            $table->string('lct_parent')->nullable();
            $table->string('lct_name')->nullable();
            $table->string('lct_post_code')->nullable();
            $table->string('lct_level')->nullable();
            $table->string('lct_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zip', function (Blueprint $table) {
            //
        });
    }
}
