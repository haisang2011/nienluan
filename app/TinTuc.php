<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    const     CREATED_AT    = 'tt_taoMoi';
    const     UPDATED_AT    = 'tt_capNhat';

    protected $table        = 'tintuc';
    protected $fillable     = ['tt_tieuDe', 'tt_tomTat', 'tt_noiDung', 'tt_hinhAnh', 'tt_soLuotXem', 'lt_ma', 'nd_ma', 'tt_taoMoi', 'tt_capNhat'];
    protected $guarded      = ['tt_ma'];

    protected $primaryKey   = 'tt_ma';

    protected $dates        = ['tt_taoMoi', 'tt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function NguoiDung(){
        return $this->beLongsTo('App\NguoiDung', 'nd_ma', 'nd_ma');
    }

    public function NguoiDungTinTuc(){
        return $this->hasMany('App\NguoiDungTinTuc', 'tt_ma', 'tt_ma');
    }

    public function BinhLuan(){
        return $this->hasMany('App\BinhLuan', 'tt_ma', 'tt_ma');
    }

    public function LoaiTin(){
        return $this->beLongsTo('App\LoaiTin', 'lt_ma', 'lt_ma');
    }
}
