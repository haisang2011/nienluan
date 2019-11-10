<?php

use Illuminate\Database\Seeder;

class TheLoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime("2019-9-18 5:00:00");

        $list = [
            [
                "tl_ma" => 1,
                "tl_ten" => "Bóng đá",
                "tl_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tl_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "tl_ma" => 2,
                "tl_ten" => "Thế giới",
                "tl_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tl_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "tl_ma" => 3,
                "tl_ten" => "Thời trang",
                "tl_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tl_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "tl_ma" => 4,
                "tl_ten" => "Pháp luật",
                "tl_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tl_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "tl_ma" => 5,
                "tl_ten" => "Kinh doanh",
                "tl_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tl_capNhat" => $today->format("Y-m-d H:i:s")
            ],
        ];
        DB::table("theloai")->insert($list);
    }
}

