<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomNguoiDungQuyen extends Model
{
    public    $timestamps = false;

    protected $table        = 'nhomnguoidung_quyen';

    protected $guarded      = ['q_ma', 'nnd_ma'];

    protected $primaryKey   = ['q_ma', 'nnd_ma'];

    public    $incrementing = false;

    public function Quyen(){
        return $this->beLongsTo('App\Quyen', 'q_ma', 'q_ma');
    }

    public function NhomNguoiDung(){
        return $this->beLongsTo('App\NhomNguoiDung', 'nnd_ma', 'nnd_ma');
    }
}
