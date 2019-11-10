<?php

use Illuminate\Database\Seeder;

class QuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('2019-09-15 08:00:00');
        $list = [
            [
                "q_ma" => 1,
                "q_ten" => "Thêm bài viết",
                "q_dienGiai" => "Quyền này dùng để viết bài",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 2,
                "q_ten" => "Xóa bài viết",
                "q_dienGiai" => "Quyền này dùng để xóa bài viết",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 3,
                "q_ten" => "Chỉnh sửa bài viết",
                "q_dienGiai" => "Quyền này dùng để chỉnh sửa bài viết",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 4,
                "q_ten" => "Quản lí bài viết",
                "q_dienGiai" => "Quyền này dùng để quản lí tất cả các bài viết",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 5,
                "q_ten" => "Quản lí thể loại, loại tin",
                "q_dienGiai" => "Quyền này dùng để thêm, sửa, xóa thể loại, loại tin tin tức",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 6,
                "q_ten" => "Quản lí tài khoản người dùng",
                "q_dienGiai" => "Quyền này dùng quản lý tài khoản",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ],
            [
                "q_ma" => 7,
                "q_ten" => "Quyền dành cho tài khoản thường",
                "q_dienGiai" => "Quyền này để lưu tin, bình luận",
                "q_taoMoi" => $today->format("Y-m-d H:i:s"),
                "q_capNhat" => $today->format("Y-m-d H:i:s")
            ]
        ];
        DB::table('quyen')->insert($list);
    }
}
