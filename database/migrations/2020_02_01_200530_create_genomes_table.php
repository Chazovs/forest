<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGenomesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genomes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('species');
            $table->integer('division_type_id');
            $table->integer('life_expectancy');
            $table->integer('beginning_fruiting_from');
            $table->integer('beginning_fruiting_to');
            $table->integer('sun_influence');
            $table->integer('first_shoots');
            $table->integer('end_growth');
            $table->integer('life_span_cambium');
            $table->integer('life_span_zabolon');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('genomes');
    }
}
