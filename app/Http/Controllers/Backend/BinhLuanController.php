<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BinhLuan;
use DB;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $binhluan = new BinhLuan();
        $binhluan->bl_noiDung = $request->binhluan;
        $binhluan->bl_ma_sub = null;
        $binhluan->tt_ma = $request->id_tintuc;
        $binhluan->nd_ma = $request->id_nguoidung;
        $binhluan->save();

        $transfer = DB::table('loaitin')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')
        ->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
        ->where('tintuc.tt_ma',$request->id_tintuc)->first();

        return redirect('/trangchu/'.$transfer->tl_tenkhongdau.'/'.$transfer->lt_tenkhongdau.'/'.$transfer->tt_ma);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tt,$id_bl)
    {
        $binhluan = BinhLuan::find($id_bl);
        $binhluan->delete();
        return redirect()->route('Backend.tintuc.edit',['id' => $id_tt])->with("thongbaobinhluan", "Xóa thành công bình luận");
    }
}
