<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung_tintuc', function (Blueprint $table) {
           $table->engine = "InnoDB";
           $table->unsignedInteger("nd_ma")->comment("Mã người dùng");
           $table->unsignedInteger("tt_ma")->comment("Mã tin tức");

            $table->primary(["nd_ma", "tt_ma"]);

           $table->foreign("nd_ma")->references("nd_ma")
                 ->on("nguoidung")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("tt_ma")->references("tt_ma")
                 ->on("tintuc")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `nguoidung_tintuc` comment 'Người dùng - Tin tức'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung_tintuc');
    }
}
