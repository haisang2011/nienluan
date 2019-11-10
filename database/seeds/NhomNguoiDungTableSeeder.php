<?php

use Illuminate\Database\Seeder;

class NhomNguoiDungTableSeeder extends Seeder
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
                "nnd_ma" => 1,
                "nnd_ten" => "Admin",
                "nnd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nnd_capNhat" => $today->format("Y-m-d H:i:s"),
            ],
            [
                "nnd_ma" => 2,
                "nnd_ten" => "Viết Bài",
                "nnd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nnd_capNhat" => $today->format("Y-m-d H:i:s"),
            ],
            [
                "nnd_ma" => 3,
                "nnd_ten" => "Quản lý bài viết",
                "nnd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nnd_capNhat" => $today->format("Y-m-d H:i:s"),
            ],
            [
                "nnd_ma" => 4,
                "nnd_ten" => "Quản lí các danh mục tin tức",
                "nnd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nnd_capNhat" => $today->format("Y-m-d H:i:s"),
            ],
            [
                "nnd_ma" => 5,
                "nnd_ten" => "Người dùng thường",
                "nnd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nnd_capNhat" => $today->format("Y-m-d H:i:s"),
            ]
        ];
        DB::table('nhomnguoidung')->insert($list);
    }
}
