<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\NguoiDung;
use App\NhomNguoiDung;
use Auth;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nguoidung = NguoiDung::all();
        $nhomnguoidung = NhomNguoiDung::all();
        return view("Backend.NguoiDung.index")->with("danhsachnguoidung", $nguoidung)->with("nhomnguoidung",$nhomnguoidung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nnd = NhomNguoiDung::all();
        return view("Backend.NguoiDung.create")->with("nnd", $nnd);
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
            'nd_hoTen' => 'required|min:5|max:100|string',
            'nd_email' => 'required|email|unique:nguoidung',
            'nd_taiKhoan' => 'required|min:3|max:100|unique:nguoidung',
            'nd_matKhau' => 'required|min:8|regex:/[\!\@\$\&\*_]{1}[A-Z]{1}[a-z0-9]+/',
            'nd_ngaySinh' => 'required',
            'nd_diaChi' => 'required|max:200',
            'nd_dienThoai' => 'required|digits:10|unique:nguoidung'
        ], 
        [
            'nd_hoTen.required' => 'Trường họ tên không được rỗng',
            'nd_hoTen.min' => 'Trường họ tên chứa tối thiểu là 5 kí tự',
            'nd_hoTen.max' => 'Trường họ tên chứa tối đa là 100 kí tự',
            'nd_hoTen.string' => 'Trường họ tên phải là chuỗi',
            'nd_email.required' => 'Trường email không được rỗng',
            'nd_email.email' => 'Trường email phải là một email',
            'nd_email.unique' => 'Email đã tồn tại',
            'nd_taiKhoan.required' => 'Tài khoản không được rỗng',
            'nd_taiKhoan.min' => 'Tài khoản chứa tối thiểu 3 kí tự',
            'nd_taiKhoan.max' => 'Tài khoản chứa tối đa 100 kí tự',
            'nd_taiKhoan.unique' => 'Tài khoản đã tồn tại',
            'nd_matKhau.required' => 'Mật khẩu không được rỗng',
            'nd_matKhau.min' => 'Mật khẩu chứa ít nhất 8 kí tự',
            'nd_matKhau.regex' => 'Mật khẩu phải theo định dạng là bắt đầu là 1 kí tự gồm : !@$&*_ theo sau là một chữ hoa và theo sau nữa là chữ cái và số',
            'nd_ngaySinh.required' => 'Ngày sinh không được rỗng',
            'nd_diaChi.required' => 'Địa chỉ không được rỗng',
            'nd_diaChi.required' => 'Trường địa chỉ tối đa 200 kí tự',
            'nd_dienThoai.required' => "Số điện thoại không được rỗng",
            'nd_dienThoai.digits' => "Số điện thoại không hợp lệ",
            'nd_dienThoai.unique' => "Số điện thoại đã tồn tại",
        ]);

        $nguoidung = new NguoiDung();
        $nguoidung->nnd_ma = $request->nnd_ma;
        $nguoidung->nd_hoten = $request->nd_hoTen;
        $nguoidung->nd_email = $request->nd_email;
        $nguoidung->nd_taiKhoan = $request->nd_taiKhoan;
        $nguoidung->nd_matKhau = Hash::make($request->nd_matKhau);
        $nguoidung->nd_ngaySinh = $request->nd_ngaySinh;
        $nguoidung->nd_diaChi = $request->nd_diaChi;
        $nguoidung->nd_dienThoai = $request->nd_dienThoai;
        $nguoidung->save();

        return redirect()->route("Backend.nguoidung.create")->with("thongbao", "Thêm thành công");
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
        $nnd = NhomNguoiDung::all();
        $id_nguoidung = NguoiDung::find($id);
        if($id_nguoidung->nnd_ma == 1 && Auth::user()->nd_taiKhoan != "root"){
            return view('Backend.layout.error');
        }
        return view("Backend.NguoiDung.edit")->with("id", $id_nguoidung)->with('nnd',$nnd);
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
            'nd_hoTen' => 'required|min:5|max:100|string',
            'nd_ngaySinh' => 'required',
            'nd_diaChi' => 'required|max:200',
        ], 
        [
            'nd_hoTen.required' => 'Trường họ tên không được rỗng',
            'nd_hoTen.min' => 'Trường họ tên chứa tối thiểu là 5 kí tự',
            'nd_hoTen.max' => 'Trường họ tên chứa tối đa là 100 kí tự',
            'nd_hoTen.string' => 'Trường họ tên phải là chuỗi',
            'nd_ngaySinh.required' => 'Ngày sinh không được rỗng',
            'nd_diaChi.required' => 'Địa chỉ không được rỗng',
            'nd_diaChi.required' => 'Trường địa chỉ tối đa 200 kí tự',
        ]);

        $nguoidung = NguoiDung::find($id);
        $nguoidung->nnd_ma = $request->nnd_ma;
        $nguoidung->nd_hoten = $request->nd_hoTen;
        $nguoidung->nd_ngaySinh = $request->nd_ngaySinh;
        $nguoidung->nd_diaChi = $request->nd_diaChi;
        $nguoidung->save();

        return redirect()->route("Backend.nguoidung.edit",['id' => $id])->with("thongbao", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoidung = NguoiDung::find($id);
        $nguoidung->delete();

        return redirect()->route("Backend.nguoidung.index")->with("thongbao", "Xóa thành công");
    }
}
