<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomnguoidungQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomnguoidung_quyen', function (Blueprint $table) {
           $table->engine = "InnoDB";
           $table->unsignedInteger("nnd_ma")->comment("# Nhóm người dùng - Quyền :  Mã nhóm người dùng");
           $table->unsignedInteger("q_ma")->comment("# Nhóm người dùng - Quyền : Mã quyền");

            $table->primary(["nnd_ma", "q_ma"]);

           $table->foreign("nnd_ma")->references("nnd_ma")
                 ->on("nhomnguoidung")->onDelete("CASCADE")->onUpdate("CASCADE");
           $table->foreign("q_ma")->references("q_ma")
                 ->on("quyen")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `nhomnguoidung_quyen` comment 'Nhóm người dùng - quyền # '");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomnguoidung_quyen');
    }
}
