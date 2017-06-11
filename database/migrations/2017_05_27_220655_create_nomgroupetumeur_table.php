<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomgroupetumeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NomGroupeTumeur', function (Blueprint $table) {
            $table->integer('ID_GroupeTumeur')->unique();
            $table->string('Val_Groupe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NomGroupeTumeur');
    }
}
