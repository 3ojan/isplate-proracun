<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeOpcinaStankovciJpgToPng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('opcine')->where('grb', 'like', '%.jpg')
            ->orWhere('favico', 'like', '%.jpg')
            ->orWhere('background', 'like', '%.jpg')
            ->update([
                'grb' => DB::raw("REPLACE(grb, 'jpg', 'png')"),
                'favico' => DB::raw("REPLACE(favico, 'jpg', 'png')"),
                'background' => DB::raw("REPLACE(favico, 'jpg', 'png')"),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('png', function (Blueprint $table) {
        //     //
        // });
    }
}
