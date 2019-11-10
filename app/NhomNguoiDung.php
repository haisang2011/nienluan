<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomNguoiDung extends Model
{
    const     CREATED_AT    = 'nnd_taoMoi';
    const     UPDATED_AT    = 'nnd_capNhat';

    protected $table        = 'nhomnguoidung';
    protected $fillable     = ['nnd_ten', 'nnd_taoMoi', 'nnd_capNhat'];
    protected $guarded      = ['nnd_ma'];

    protected $primaryKey   = 'nnd_ma';

    protected $dates        = ['nnd_taoMoi', 'nnd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function NhomNguoiDungQuyen(){
        return $this->hasMany('App\NhomNguoiDungQuyen', 'nnd_ma', 'nnd_ma');
    }

    public function NguoiDung(){
        return $this->hasMany('App\NguoiDung', 'nnd_ma', 'nnd_ma');
    }
}
