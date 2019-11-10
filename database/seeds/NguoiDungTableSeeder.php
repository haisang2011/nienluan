<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NguoiDungTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime();
        $faker = Faker\Factory::create();
        $list = [
            [
                "nd_ma" => 1,
                "nnd_ma" => 1,
                "nd_hoTen" => "Nguyễn Huỳnh Hải Sang",
                "nd_email" => "nguyensang@gmail.com",
                "nd_taiKhoan" => "admin",
                "nd_matKhau" => Hash::make('1'),
                "nd_ngaySinh" => $today->format("Y-m-d H:i:s"),
                "nd_diaChi" => "Lân Thạnh II",
                "nd_dienThoai" => "0375376508",
                "nd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nd_capNhat" => $today->format("Y-m-d H:i:s"),
            ],
            [
                "nd_ma" => 2,
                "nnd_ma" => 2,
                "nd_hoTen" => "Nguyễn Huỳnh Hải Đăng",
                "nd_email" => "nguyendang@gmail.com",
                "nd_taiKhoan" => "minh",
                "nd_matKhau" => Hash::make('123'),
                "nd_ngaySinh" => $today->format("Y-m-d H:i:s"),
                "nd_diaChi" => "Lân Thạnh II",
                "nd_dienThoai" => "0375376508",
                "nd_taoMoi" => $today->format("Y-m-d H:i:s"),
                "nd_capNhat" => $today->format("Y-m-d H:i:s"),
            ]
        ];
        // for($i = 0; $i<10; $i++){
        //     array_push($list, [
        //         "nd_ma" => $i,
        //         "nnd_ma" => $faker->numberBetween($min = 1, $max = 5),
        //         "nd_hoTen" => $faker->name,
        //         "nd_email" => $faker->email,
        //         "nd_taiKhoan" => $faker->userName,
        //         "nd_matKhau" => $faker->password,
        //         "nd_ngaySinh" => $faker->dateTime($max = 'now', $timezone = null),
        //         "nd_diaChi" => $faker->address,
        //         "nd_dienThoai" => $faker->phoneNumber,
        //         "nd_taoMoi" => $today->format("Y-m-d H:i:s"),
        //         "nd_capNhat" => $today->format("Y-m-d H:i:s"),
        //     ]);
        // }
        DB::table('nguoidung')->insert($list);
    }
}
