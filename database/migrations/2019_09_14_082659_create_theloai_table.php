<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheloaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theloai', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedInteger("tl_ma")->autoIncrement()->comment("Mã thể loại");
            $table->string("tl_ten", 100)->comment("Tên thể loại");
            $table->timestamp("tl_taoMoi")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm đầu tiên tạo thể loại");
            $table->timestamp("tl_capNhat")->default(DB::raw("CURRENT_TIMESTAMP"))->comment("Thời điểm cập nhật thể loại gần nhất");

            $table->unique(['tl_ten']);
        });
        DB::statement("ALTER TABLE `theloai` comment 'Thể loại # các thể loại'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theloai');
    }
}
