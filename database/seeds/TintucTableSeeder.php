<?php

use Illuminate\Database\Seeder;

class TintucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $today = new DateTime("2019-9-18 5:00:00");
        $list = [];
        for($i = 0; $i<50; $i++){
            array_push($list, [
                "tt_ma" => $i,
                "nd_ma" => $faker->numberBetween($min = 1, $max = 2),
                "lt_ma" => $faker->numberBetween($min = 1, $max = 15),
                "tt_tieuDe" => $faker->text($maxNbChars = 200),
                "tt_tomTat" => $faker->text($maxNbChars = 400),
                "tt_noiDung" => $faker->text($maxNbChars = 2000),
                "tt_hinhAnh" => "{{asset(vendor/img/...)}}",
                "tt_soLuotXem" => 0,
                "tt_taoMoi" => $today->format("Y-m-d H:i:s"),
                "tt_capNhat" => $today->format("Y-m-d H:i:s")
            ]);
        }
        DB::table('tintuc')->insert($list);
    }
}
