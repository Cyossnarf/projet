<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodetablesattTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CodeTablesAtt', function (Blueprint $table) {
            $table->integer('CodeDico')->unique();
            $table->string('AttributName');
            $table->string('TypeAttr');
			$table->string('TableListe');
			$table->string('TableName');
            $table->string('Dénomination');
			$table->string('DataComplete');
			$table->string('RattacheeAtable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CodeTablesAtt');
    }
}
