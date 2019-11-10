<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use Storage; 
use Image;
use Auth;


class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index_private($id)
    // {
    //     $tintuc = TinTuc::where('nd_ma',$id)->get();
    //     return view("Backend.TinTuc.index_private")->with("danhsachtintuc", $tintuc);
    // }
    
    public function index()
    {
        $tintuc = TinTuc::paginate(10);
        return view("Backend.TinTuc.index")->with("danhsachtintuc", $tintuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view("Backend.TinTuc.create")
        ->with("danhsachtheloai", $theloai)
        ->with("danhsachloaitin", $loaitin);
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
            'tl_ma' => 'required',
            'lt_ma' => 'required',
            'tt_tieuDe' => 'required|max:200', // able use unique
            'tt_tomTat' => 'required|max:350',
            'tt_noiDung' => 'required',
            'tt_hinhAnh' => 'required|file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ], 
        [
            'tl_ma.required' => 'Thể loại không được rỗng',
            'lt_ma.required' => 'Loại tin không được rỗng',
            'tt_tieuDe.required' => 'Tiêu đề không được rỗng',
            'tt_tieuDe.max' => 'Tiêu đề không được dài hơn 200 kí tự',
            'tt_tomTat.required' => 'Tóm tắt không được rỗng',
            'tt_tomTat.max' => 'Tóm tắt không được dài hơn 350 kí tự',
            'tt_hinhAnh.required' => 'Hình ảnh không thể rỗng',
            'tt_hinhAnh.mimes' => 'Phần đuôi hình ảnh phải là jpg, jpeg, png, gif',
            'tt_hinhAnh.max' => 'kích thước tối đa của file là 2048'
        ]);

        $tintuc = new TinTuc();
        $tintuc->lt_ma = $request->lt_ma;
        $tintuc->tt_soLuotXem = 0;
        $tintuc->nd_ma = Auth::user()->nd_ma;
        $tintuc->tt_tieuDe = $request->tt_tieuDe;
        $tintuc->tt_tomTat = $request->tt_tomTat;
        $tintuc->tt_noiDung = $request->tt_noiDung;

        //Cach nay xu ly str_random()
        // if($request->hasFile('tt_hinhAnh')){
        //     $file = $request->tt_hinhAnh;
        //     $namefile = str_random(4).'_'.$file->getClientOriginalName();
        //     while(file_exists($namefile)){
        //         $namefile = str_random(4).'_'.$file->getClientOriginalName();
        //     }
        //     $tintuc->tt_hinhAnh = $namefile;

        //     // chep anh vao thu muc photos
        //     $fileSaved = $file->storeAs('public/photos', $tintuc->tt_hinhAnh);
        // }

        //Cach nay xu ly time()
        if($request->hasFile('tt_hinhAnh')) {
            //get filename with extension
            $filenamewithextension = $request->file('tt_hinhAnh')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('tt_hinhAnh')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $tintuc->tt_hinhAnh = $filenametostore;
     
            //Upload File
            $request->file('tt_hinhAnh')->storeAs('public/photos', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('storage/photos/'.$filenametostore);
            // $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->save($thumbnailpath);
            $img = Image::make($thumbnailpath)->resize(800, 500)->save($thumbnailpath);
        }
        $tintuc->save();

        return redirect()->route("Backend.tintuc.create")->with("thongbao", "Thêm thành công");
    }

//     public function store(Request $request)
// {
//     if($request->hasFile('profile_image')) {
//         //get filename with extension
//         $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
 
//         //get filename without extension
//         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
//         //get file extension
//         $extension = $request->file('profile_image')->getClientOriginalExtension();
 
//         //filename to store
//         $filenametostore = $filename.'_'.time().'.'.$extension;
 
//         //Upload File
//         $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
//         $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);
 
//         //Resize image here
//         $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
//         // $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
//         //     $constraint->aspectRatio();
//         // });
//         // $img->save($thumbnailpath);
//         $img = Image::make($thumbnailpath)->resize(100, 100)->save($thumbnailpath);
 
//         return redirect('images')->with('success', "Image uploaded successfully.");
//     }
// }
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
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view("Backend.TinTuc.edit")
        ->with('id', $tintuc)
        ->with("danhsachtheloai", $theloai)
        ->with("danhsachloaitin", $loaitin);
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
            'tl_ma' => 'required',
            'lt_ma' => 'required',
            'tt_tieuDe' => 'required|max:200', // able use unique
            'tt_tomTat' => 'required|max:350',
            'tt_noiDung' => 'required',
            'tt_hinhAnh' => 'file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ], 
        [
            'tl_ma.required' => 'Thể loại không được rỗng',
            'lt_ma.required' => 'Loại tin không được rỗng',
            'tt_tieuDe.required' => 'Tiêu đề không được rỗng',
            'tt_tieuDe.max' => 'Tiêu đề không được dài hơn 200 kí tự',
            'tt_tomTat.required' => 'Tóm tắt không được rỗng',
            'tt_tomTat.max' => 'Tóm tắt không được dài hơn 350 kí tự',
            'tt_hinhAnh.mimes' => 'Phần đuôi hình ảnh phải là jpg, jpeg, png, gif',
            'tt_hinhAnh.max' => 'kích thước tối đa của file là 2048'
        ]);

        $tintuc = TinTuc::find($id);
        $tintuc->lt_ma = $request->lt_ma;
        $tintuc->nd_ma = $tintuc->nd_ma;
        $tintuc->tt_soLuotXem = $tintuc->tt_soLuotXem;
        $tintuc->tt_tieuDe = $request->tt_tieuDe;
        $tintuc->tt_tomTat = $request->tt_tomTat;
        $tintuc->tt_noiDung = $request->tt_noiDung;
        if($request->hasFile('tt_hinhAnh')){
            //delete image old
            Storage::delete('public/photos/'.$tintuc->tt_hinhAnh);

            //Upload image new
            // $file = $request->tt_hinhAnh;
            // $name = $namefile = str_random(4).'_'.$file->getClientOriginalName();
            // while(file_exists($name)){
            //     $name = $namefile = str_random(4).'_'.$file->getClientOriginalName();
            // }
            // $tintuc->tt_hinhAnh = $namefile;

            //save image in storage
            // $fileSaved = $file->storeAs('public/photos', $name);

                $filenamewithextension = $request->file('tt_hinhAnh')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('tt_hinhAnh')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.time().'.'.$extension;
                $tintuc->tt_hinhAnh = $filenametostore;
                $request->file('tt_hinhAnh')->storeAs('public/photos', $filenametostore);
                $thumbnailpath = public_path('storage/photos/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(800, 500)->save($thumbnailpath);
        }else{
            $tintuc->tt_hinhAnh = $tintuc->tt_hinhAnh;
        }
        $tintuc->save();

        return redirect()->route("Backend.tintuc.edit", ['id' => $tintuc->tt_ma])->with("thongbao","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tt = TinTuc::find($id);

        if(empty($tt) == false){
            Storage::delete('public/photos/'.$tt->tt_hinhAnh);
        }

        $tt->delete();

        return redirect()->route('Backend.tintuc.index')->with("thongbao", "Xóa thành công");
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $thumbnailpath = $request->file('upload')->move(public_path('images'), $fileName);
            $img = Image::make($thumbnailpath)->resize(750, 500)->save($thumbnailpath);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
