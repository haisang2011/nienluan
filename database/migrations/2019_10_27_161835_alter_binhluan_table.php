<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->timestamp("bl_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->timestamp("bl_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"));
        });
    }
}
