<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quyen = Quyen::all();
        return view("Backend.Quyen.index")->with("danhsachquyen", $quyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Backend.Quyen.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'q_ten' => 'required|min:3|max:50|unique:quyen',
            'q_dienGiai' => 'required|min:10|max:100'
        ], 
        [
            'q_ten.required' => 'Bạn chưa nhập tên quyền',
            'q_ten.min'      => 'Tên quyền chứa ít nhất 3 kí tự ',
            'q_ten.max'      => 'Tên quyền chứa tối đa 100 kí tự',
            'q_ten.unique'   => "Tên quyền đã tồn tại",
            'q_dienGiai.required' => 'Bạn chưa nhập diễn giải',
            'q_dienGiai.min'      => 'Phần diễn giải chứa ít nhất 10 kí tự ',
            'q_dienGiai.max'      => 'Phần diễn giải chứa tối đa 100 kí tự'
        ]);

        $quyen = new Quyen();
        $quyen->q_ten = $request->q_ten;
        $quyen->q_dienGiai = $request->q_dienGiai;
        $quyen->save();

        return redirect()->route("Backend.quyen.create")->with("thongbao", "Thêm thành công");
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
        $quyen = Quyen::find($id);
        return view("Backend.Quyen.edit")->with("id", $quyen);
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
        $this->validate($request, [
            'q_ten' => 'required|min:3|max:50|unique:quyen',
            'q_dienGiai' => 'required|min:10|max:100'
        ], 
        [
            'q_ten.required' => 'Bạn chưa nhập tên quyền',
            'q_ten.min'      => 'Tên quyền chứa ít nhất 3 kí tự ',
            'q_ten.max'      => 'Tên quyền chứa tối đa 100 kí tự',
            'q_ten.unique'   => "Tên quyền đã tồn tại",
            'q_dienGiai.required' => 'Bạn chưa nhập diễn giải',
            'q_dienGiai.min'      => 'Phần diễn giải chứa ít nhất 10 kí tự ',
            'q_dienGiai.max'      => 'Phần diễn giải chứa tối đa 100 kí tự'
        ]);

        $quyen = Quyen::find($id);
        $quyen->q_ten = $request->q_ten;
        $quyen->q_dienGiai = $request->q_dienGiai;
        $quyen->save();

        return redirect()->route("Backend.quyen.edit", ["id" => $id])->with("thongbao", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::find($id);
        $quyen->delete();
        return redirect()->route("Backend.quyen.index")->with("thongbao", "Xóa thành công");
    }
}
