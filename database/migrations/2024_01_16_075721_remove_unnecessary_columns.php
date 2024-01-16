<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class RemoveUnnecessaryColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::info('--------------------------------------------------------------');
        Log::info('Running migration: dropping unnecessary columns');
        Log::info(Carbon\Carbon::now());
        Log::info('--------------------------------------------------------------');

        Schema::table('isplate', function (Blueprint $table) {
            // Add a new timestamp column to the 'isplate' table
            if (Schema::hasColumn('isplate', 'adresa')) {
                $table->dropColumn('adresa');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
