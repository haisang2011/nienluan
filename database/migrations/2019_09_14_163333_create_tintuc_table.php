<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedInteger("tt_ma")->autoIncrement()->comment("Mã tin tức");
            $table->string("tt_tieuDe", 500)->comment("Tiêu đề tin tức");//
            $table->string("tt_tomTat", 550)->comment("Tóm tắt nội dung tin tức");//
            $table->longText("tt_noiDung")->comment("Nội dung tin tức");
            $table->string("tt_hinhAnh", 350)->comment("Hình ảnh của tin tức")->nullable();
            $table->integer("tt_soLuotXem")->comment("Số lượt xem tin tức")->nullable();
            $table->unsignedInteger("lt_ma")->comment("Mã loại tin");
            $table->unsignedInteger("nd_ma")->comment("Mã người dùng");
            $table->timestamp("tt_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm tạo bài viết");
            $table->timestamp("tt_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm cập nhật bài viết gần nhất");

            $table->foreign("lt_ma")->references("lt_ma")
                 ->on("loaitin")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("nd_ma")->references("nd_ma")
                 ->on("nguoidung")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `tintuc` comment 'Tin Tức # Bài viết'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
}
