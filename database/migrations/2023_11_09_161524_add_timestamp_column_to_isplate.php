<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTimestampColumnToIsplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isplate', function (Blueprint $table) {
            // Add a new timestamp column to the 'isplate' tabl
            if (!Schema::hasColumn('isplate', 'created_at')) {
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::table('isplate', function (Blueprint $table) {
            // Remove the column if the migration is rolled back
            $table->dropColumn('created_at'); // Replace 'new_column_name' with the actual column name you want to remove
        });
    }
}
