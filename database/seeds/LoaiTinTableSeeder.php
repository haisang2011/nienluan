<?php

use Illuminate\Database\Seeder;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime("2019-09-18 5:00:00");
        $list = [
            [
                "lt_ma" => 1,
                "tl_ma" => 1,
                "lt_ten" => "Lịch thi đấu",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 2,
                "tl_ma" => 1,
                "lt_ten" => "Bóng đá việt nam",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 3,
                "tl_ma" => 1,
                "lt_ten" => "Ngoại hạng anh",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 4,
                "tl_ma" => 2,
                "lt_ten" => "Điểm nóng",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 5,
                "tl_ma" => 2,
                "lt_ten" => "Quân sự",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 6,
                "tl_ma" => 2,
                "lt_ten" => "Thế giới động vật",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 7,
                "tl_ma" => 3,
                "lt_ten" => "Thời trang công sở",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 8,
                "tl_ma" => 3,
                "lt_ten" => "Xu hướng thời trang",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 9,
                "tl_ma" => 3,
                "lt_ten" => "Người mẫu hoa hậu",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 10,
                "tl_ma" => 4,
                "lt_ten" => "Tệ nạn xã hội",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 11,
                "tl_ma" => 4,
                "lt_ten" => "Cảnh giác",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 12,
                "tl_ma" => 4,
                "lt_ten" => "Hồ sơ vụ án",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 13,
                "tl_ma" => 5,
                "lt_ten" => "Doanh nhân",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 14,
                "tl_ma" => 5,
                "lt_ten" => "Tài chính",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "lt_ma" => 15,
                "tl_ma" => 5,
                "lt_ten" => "Khởi nghiệp",
                "lt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "lt_capNhat" => $today->format("Y-m-d H:i:s")
            ]
        ];
        DB::table('loaitin')->insert($list);
    }
}
