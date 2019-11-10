<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedInteger("bl_ma")->autoIncrement()->comment("Mã bình luận");
            $table->unsignedInteger("bl_ma_sub")->comment("Mã bình luận cấp 2");
            $table->text("bl_noiDung")->comment("Nội dung bình luận");
            $table->unsignedInteger("tt_ma")->comment("Mã tin tức");
            $table->unsignedInteger("nd_ma")->comment("Mã người dùng");
            $table->timestamp("bl_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm đầu tiên tạo bình luận");

            $table->foreign("tt_ma")->references("tt_ma")
                 ->on("tintuc")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("nd_ma")->references("nd_ma")
                 ->on("nguoidung")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("bl_ma_sub")->references("bl_ma")
                 ->on("binhluan")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `binhluan` comment 'Bình luận'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
