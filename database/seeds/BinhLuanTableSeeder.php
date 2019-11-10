<?php

use Illuminate\Database\Seeder;

class BinhLuanTableSeeder extends Seeder
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
                "bl_ma" =>  1,
                "tt_ma" =>  1,
                "bl_ma_sub" =>  0,  
                "nd_ma" =>  1,
                "bl_noiDung"  =>  "Day La Binh Luan Cha",  
                "bl_taoMoi" =>  $today->format("Y-m-d H:i:s")
            ],
            [
                "bl_ma" =>  2,
                "tt_ma" =>  1,
                "bl_ma_sub" =>  1,  
                "nd_ma" =>  2,
                "bl_noiDung"  =>  "Day La Binh Luan Con",  
                "bl_taoMoi" =>  $today->format("Y-m-d H:i:s")
            ]
        ];
    }
}
