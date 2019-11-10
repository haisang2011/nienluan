<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomnguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomnguoidung', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedInteger("nnd_ma")->autoIncrement()->comment("Mã nhóm người dùng");
            $table->string("nnd_ten", 50)->comment("Tên nhóm người dùng : 1-Quản trị, 2-Đăng bài, 3-Độc giả");
            $table->timestamp("nnd_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm đầu tiên tạo nhóm người dùng");
            $table->timestamp("nnd_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm cập nhật nhóm người dùng gần nhất");

            $table->unique(["nnd_ten"]);
        });
        DB::statement("ALTER TABLE `nhomnguoidung` comment 'Nhóm người dùng #Nhóm người dùng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomnguoidung');
    }
}
