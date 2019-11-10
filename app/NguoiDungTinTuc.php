<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDungTinTuc extends Model
{
    public $timestamps = false;

    protected $table        = 'nguoidung_tintuc';

    protected $guarded      = ['nd_ma', 'tt_ma'];

    protected $primaryKey   = ['nd_ma', 'tt_ma'];

    public $incrementing = false;

    public function NguoiDung(){
        return $this->beLongsTo('App\NguoiDung', 'nd_ma', 'nd_ma');
    }

    public function TinTuc(){
        return $this->beLongsTo('App\TinTuc', 'tt_ma', 'tt_ma');
    }
}
