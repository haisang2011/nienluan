<?php

use Illuminate\Database\Seeder;

class NhomNguoiDungQuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                "nnd_ma" => 1,
                "q_ma" => 1
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 2
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 3
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 4
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 5
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 6
            ],
            [
                "nnd_ma" => 1,
                "q_ma" => 7
            ],
            [
                "nnd_ma" => 2,
                "q_ma" => 1
            ],
            [
                "nnd_ma" => 2,
                "q_ma" => 2
            ],
            [
                "nnd_ma" => 2,
                "q_ma" => 3
            ],
            [
                "nnd_ma" => 3,
                "q_ma" => 2
            ],
            [
                "nnd_ma" => 3,
                "q_ma" => 3
            ],
            [
                "nnd_ma" => 3,
                "q_ma" => 4
            ],
            [
                "nnd_ma" => 4,
                "q_ma" => 5
            ],
            [
                "nnd_ma" => 5,
                "q_ma" => 7
            ],
        ];
        DB::table('nhomnguoidung_quyen')->insert($list);
    }
}
