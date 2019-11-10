<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $theloai = Theloai::all();
        return view('Frontend.index')->with('theloai',$theloai);
    }

    public function index_category(){
        $theloai = TheLoai::all();
        return view("Frontend.layout.master")->with("theloai", $theloai);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($the_loai)
    {
        $theloai = TheLoai::all();

        $category = DB::table('loaitin')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')->where('tl_tenkhongdau',$the_loai)->get();
        return view('Frontend.layout.master')->with('category', $category)->with('theloai', $theloai);
    }


    public function loaitin($the_loai,$loaitin){
        $theloai = TheLoai::all();
        $tintuc = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma','=','loaitin.lt_ma')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')->where('loaitin.lt_tenkhongdau',$loaitin)->orderBy('tintuc.tt_capNhat','DESC')->get();
        $loai_tin = DB::table('loaitin')->where('lt_tenkhongdau',$loaitin)->first();
        return view('Frontend.LoaiTin')->with('theloai',$theloai)->with('tintuc',$tintuc)->with('loaitin',$loai_tin->lt_ten);
    }

    public function tintuc($the_loai,$loaitin,$tintuc){
        $theloai = TheLoai::all();
        return view("Frontend.tin")->with('theloai',$theloai)->with('id_tin',$tintuc)->with("loaitin",$loaitin);
    }

    public function timkiem(Request $request){
        $theloai = TheLoai::all();
        $tukhoa = $request->tukhoa;
        if($tukhoa == ""){
            $timkiem = DB::table('loaitin')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
            ->where('tintuc.tt_ma',-10)->get();
            return view('Frontend.widgets.timkiem')->with('timkiem',$timkiem)->with('tukhoa',$tukhoa)->with('theloai',$theloai);
        }
        $timkiem = DB::table('loaitin')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
        ->where('tintuc.tt_tieuDe','like','%'.$tukhoa.'%')->orWhere('tintuc.tt_tomTat','like','%'.$tukhoa.'%')->orWhere('tintuc.tt_noiDung','like','%'.$tukhoa.'%')->get();
        return view('Frontend.widgets.timkiem')->with('timkiem',$timkiem)->with('tukhoa',$tukhoa)->with('theloai',$theloai);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "kaka";
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
    public function destroy($id)
    {
        //
    }

    public function test(){
        $theloai = TheLoai::all();
        $contains = [];
        for($i = 0; $i<count($theloai); $i++){
            $contains[$i] = $theloai[$i];
        }
        dd($contains);
    }
}
