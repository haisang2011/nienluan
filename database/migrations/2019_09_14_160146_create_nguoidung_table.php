<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
           $table->engine = "InnoDB";
           $table->unsignedInteger("nd_ma")->autoIncrement()->comment("Mã người dùng");
           $table->string("nd_hoTen", 100)->comment("Họ tên người dùng");
           $table->string("nd_email", 100)->comment("Email người dùng");
           $table->string("nd_taiKhoan", 100)->comment("Tài khoản người dùng");
           $table->string("nd_matKhau", 100)->comment("Mật khẩu người dùng");
           $table->date('nd_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày sinh # Ngày sinh');
           $table->string("nd_diaChi", 500)->comment("Địa chỉ người dùng"); //
           $table->string("nd_dienThoai", 50)->comment("Số điện thoại người dùng"); //
           $table->timestamp("nd_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm đầu tiên tạo người dùng");
           $table->timestamp("nd_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm cập nhật người dùng gần nhất");
           $table->unsignedInteger("nnd_ma")->comment("Mã nhóm người dùng");

           $table->unique(["nd_email", "nd_taiKhoan", "nd_dienThoai"]);
           $table->foreign("nnd_ma")->references("nnd_ma")
                 ->on("nhomnguoidung")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
        DB::statement("ALTER TABLE `nguoidung` comment 'Người dùng # người dùng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
