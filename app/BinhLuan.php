<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    const     CREATED_AT    = 'bl_taoMoi';
    const     UPDATED_AT    = 'bl_capNhat';

    protected $table        = 'binhluan';
    protected $fillable     = ['bl_ma_sub', 'bl_noiDung', 'tt_ma', 'nd_ma'];
    protected $guarded      = ['bl_ma'];

    protected $primaryKey   = 'bl_ma';

    protected $dates        = ['bl_taoMoi'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function NguoiDung(){
        return $this->beLongsTo('App\NguoiDung', 'nd_ma', 'nd_ma');
    }

    public function TinTuc(){
        return $this->beLongsTo('App\TinTuc', 'tt_ma', 'tt_ma');
    }

    public function BinhLuan(){
        return $this->hasMany('App\BinhLuan', 'bl_ma_sub', 'bl_ma');
    } 
}
