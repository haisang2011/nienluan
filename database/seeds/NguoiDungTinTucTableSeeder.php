<?php

use Illuminate\Database\Seeder;

class NguoiDungTinTucTableSeeder extends Seeder
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
                "nd_ma" =>  1,
                "tt_ma" =>  1
            ],
        ];
        DB::table('nguoidung_tintuc')->insert($list);
    }
}
