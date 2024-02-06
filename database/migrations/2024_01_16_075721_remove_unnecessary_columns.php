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
            if (Schema::hasColumn('isplate', 'naziv')) {
                $table->dropColumn('naziv');
            }
            if (Schema::hasColumn('isplate', 'adresa')) {
                $table->dropColumn('adresa');
            }
            if (Schema::hasColumn('isplate', 'zupanija')) {
                $table->dropColumn('zupanija');
            }
            if (Schema::hasColumn('isplate', 'homepage')) {
                $table->dropColumn('homepage');
            }
            if (Schema::hasColumn('isplate', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('isplate', 'url')) {
                $table->dropColumn('url');
            }
            if (Schema::hasColumn('isplate', 'grb')) {
                $table->dropColumn('grb');
            }
            if (Schema::hasColumn('isplate', 'favico')) {
                $table->dropColumn('favico');
            }
            if (Schema::hasColumn('isplate', 'background')) {
                $table->dropColumn('background');
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
        //nothing to do
    }
}
