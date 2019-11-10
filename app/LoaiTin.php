<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    const     CREATED_AT    = 'lt_taoMoi';
    const     UPDATED_AT    = 'lt_capNhat';

    protected $table        = 'loaitin';
    protected $fillable     = ['lt_ten', 'tl_ma', 'lt_taoMoi', 'lt_capNhat'];
    protected $guarded      = ['lt_ma'];

    protected $primaryKey   = 'lt_ma';

    protected $dates        = ['lt_taoMoi', 'lt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function TheLoai(){
        return $this->beLongsTo('App\TheLoai', 'tl_ma', 'tl_ma');
    }
}
