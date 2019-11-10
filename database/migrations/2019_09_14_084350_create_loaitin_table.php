<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaitinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitin', function (Blueprint $table) {
           $table->engine = "InnoDB";
           $table->unsignedInteger("lt_ma")->autoIncrement()->comment("Mã loại tin");
           $table->string("lt_ten", 100)->comment("Tên loại tin");
           $table->unsignedInteger("tl_ma")->comment("Mã thể loại");
           $table->timestamp("lt_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm đầu tiên tạo loại tin");
           $table->timestamp("lt_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm cập nhật loại tin gần nhất");

           $table->unique(["lt_ten"]);
           $table->foreign("tl_ma")
                 ->references("tl_ma")
                 ->on("theloai")
                 ->onDelete("CASCADE")
                 ->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `loaitin` comment 'Loại Tin # Loại Tin'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaitin');
    }
}
