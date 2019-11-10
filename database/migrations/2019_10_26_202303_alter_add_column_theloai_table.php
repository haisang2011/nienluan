<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddColumnTheloaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theloai', function (Blueprint $table) {
            $table->String('tl_tinkhongdau',200)->comment('Tên thể loại không dấu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theloai', function (Blueprint $table) {
            $table->String('tl_tinkhongdau',200)->comment('Tên thể loại không dấu');
        });
    }
}
