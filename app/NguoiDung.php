<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // new

// class NguoiDung extends Model
class NguoiDung extends Authenticatable
{
    const     CREATED_AT    = 'nd_taoMoi';
    const     UPDATED_AT    = 'nd_capNhat';

    protected $table        = 'nguoidung';
    protected $fillable     = ['nd_hoTen', 'nd_email', 'nd_taiKhoan', 'nd_matKhau', 'nd_ngaySinh', 'nd_diaChi', 'nd_dienThoai', 'nd_taoMoi', 'nd_capNhat', 'nnd_ma'];
    // protected $guarded      = ['nd_ma'];

    protected $primaryKey   = 'nd_ma';

    protected $dates        = ['nd_ngaySinh', 'nd_taoMoi', 'nd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function NhomNguoiDung(){
        return $this->beLongsTo('App\NhomNguoiDung', 'nnd_ma', 'nnd_ma');
    }
    public function getAuthPassword()
    {
        return $this->nd_matKhau;
    }
    public function TinTuc(){
        return $this->hasMany('App\TinTuc', 'nd_ma', 'nd_ma');
    }

    public function NguoiDungTinTuc(){
        return $this->hasMany('App\NguoiDungTinTuc', 'nd_ma', 'nd_ma');
    }

    public function BinhLuan(){
        return $this->hasMany('App\BinhLuan', 'nd_ma', 'nd_ma');
    }
}
