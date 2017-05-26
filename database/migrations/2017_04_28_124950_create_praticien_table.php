<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraticienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Praticien', function (Blueprint $table) {
			// Le numero rpps?
            $table->string('ID_Prac', 12)->unique();
			// Le syst d'info de l'hopital?
            $table->string('SIH');
            $table->string('Prénom');
            $table->string('Nom');
			$table->string('DateNaissance');
			$table->string('password', 60);
			$table->boolean('admin')->default(false);
            $table->rememberToken();
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
        Schema::drop('Praticien');
    }
}
