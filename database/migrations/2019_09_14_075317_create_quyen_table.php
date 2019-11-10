<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedInteger("q_ma")->autoIncrement()->comment("Quyền : 1-Đăng Bài, 2-Sửa Bài, 3-Xóa Bài, 4-Thường");
            $table->string("q_ten", 50)->comment("Tên Quyền");
            $table->string("q_dienGiai", 100)->comment("Diễn Giải Về Quyền")->nullable();
            $table->timestamp('q_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đầu tiên tạo quyền');
            $table->timestamp("q_capNhat")->default(DB::raw('CURRENT_TIMESTAMP'))->comment("Thời điểm cập nhật quyền gần nhất");

            $table->unique(['q_ten']);
        });
        DB::statement("ALTER TABLE `quyen` comment 'Quyền # Các quyền để quản lý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
