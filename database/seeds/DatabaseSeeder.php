<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TheLoaiTableSeeder::class);
        $this->call(LoaiTinTableSeeder::class);
        $this->call(QuyenTableSeeder::class);
        $this->call(NhomNguoiDungTableSeeder::class);
        $this->call(NhomNguoiDungQuyenTableSeeder::class);
        $this->call(NguoiDungTableSeeder::class);
        //$this->call(TintucTableSeeder::class);
        //$this->call(NguoiDungTinTucTableSeeder::class);
        //$this->call(BinhLuanTableSeeder::class);
    }
}
