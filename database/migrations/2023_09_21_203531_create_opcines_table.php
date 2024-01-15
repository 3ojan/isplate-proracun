<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('opcine')) {

            Schema::create('opcine', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('rkpid')->unique();
                $table->string('naziv');
                $table->string('adresa');
                $table->string('mjesto')->nullable();
                $table->string('zupanija')->nullable();
                $table->string('homepage')->nullable();
                $table->string('oib', 11)->unique();
                $table->string('url')->unique();
                $table->string('grb');
                $table->string('favico');
                $table->string('background');
                $table->text('description');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcine');
    }
}
