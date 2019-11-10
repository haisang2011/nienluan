<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddColumnLoaitinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loaitin', function (Blueprint $table) {
            $table->String('lt_tinkhongdau',200)->comment('Tên loại tin không dấu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loaitin', function (Blueprint $table) {
            $table->String('lt_tinkhongdau',200)->comment('Tên loại tin không dấu');
        });
    }
}
