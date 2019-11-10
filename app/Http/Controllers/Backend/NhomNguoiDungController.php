<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhomNguoiDung;
use App\Quyen;
use App\NhomNguoiDungQuyen;
use DB;
use Auth;

class NhomNguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nnd = NhomNguoiDung::all();
        return view("Backend.NhomNguoiDung.index")->with("danhsach",$nnd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quyen = Quyen::all();
        return view("Backend.NhomNguoiDung.create")->with("quyen", $quyen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nnd_ten' => 'required|min: 3|max: 50|unique: nhomnguoidung',
        // ], 
        // [
        //     'nnd_ten.required' => 'Bạn chưa nhập tên loại tin',
        //     'nnd_ten.min'      => 'Tên nhóm chứa ít nhất 3 kí tự ',
        //     'nnd_ten.max'      => 'Tên nhóm chứa tối đa 100 kí tự',
        //     'nnd_ten.unique'   => "Tên nhóm đã tồn tại",
        // ]);

        $nnd = new NhomNguoiDung();
        $nnd->nnd_ten = $request->nnd_ten;
        $nnd->save();

        $ma = NhomNguoiDung::where('nnd_ten', $request->nnd_ten)->first();
        $quyen = count($request->quyen);
        for($i = 0; $i<$quyen; $i++){
            $nnd_q = new NhomNguoiDungQuyen();
            $nnd_q->nnd_ma = $ma->nnd_ma;
            $nnd_q->q_ma = $request->quyen[$i];
            $nnd_q->save();
        }

        return redirect()->route("Backend.nhomnguoidung.index")->with("thongbao", "Thêm thành công");
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
        $nnd = NhomNguoiDung::find($id);
        if($nnd->nnd_ma == 1 && Auth::user()->nd_taiKhoan != "root"){
            return view('Backend.layout.errorEditUser');
        }
        $quyen = Quyen::all();
        $show = DB::table('nhomnguoidung_quyen')->join('quyen', 'nhomnguoidung_quyen.q_ma', '=', 'quyen.q_ma')
        ->join('nhomnguoidung', 'nhomnguoidung_quyen.nnd_ma', '=', 'nhomnguoidung.nnd_ma')
        ->where('nhomnguoidung_quyen.nnd_ma', $id)->get();
        return view("Backend.NhomNguoiDung.edit")->with("id",$nnd)->with("quyen", $quyen)->with('show', $show);
    }
    //<td><input type="checkbox" name="quyen[]" id="quyen_create_cb" value="{{$q->q_ma}}"></td>
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nnd = NhomNguoiDung::find($id);
        $nnd->nnd_ten = $request->nnd_ten;
        $nnd->save();

        $nnd_q = DB::table('nhomnguoidung_quyen')->where('nnd_ma', $id)->delete();

        $nnd_q_new = count($request->quyen);
        for($i = 0; $i<$nnd_q_new; $i++){
            $t = new NhomNguoiDungQuyen();
            $t->nnd_ma = $nnd->nnd_ma;
            $t->q_ma = $request->quyen[$i];
            $t->save();
        }

        return redirect()->route("Backend.nhomnguoidung.index")->with("thongbao", 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nnd = NhomNguoiDung::find($id);
        $nnd->delete();
        return redirect()->route("Backend.nhomnguoidung.index")->with("thongbao", "Xóa thành công");
        
    }
}
