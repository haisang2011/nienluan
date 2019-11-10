<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiDung;
use Hash;
use DB;
use App\Rules\CheckPassword;

class ChangePasswordController extends Controller
{
    public function formchangepassword(){
        return view('auth.changepassword');
    }

    public function changepassword(Request $request){

        $validator = Validator::make($request->all(),[
            'nd_matKhau_new' => 'required|min:8|regex:/[\!\@\$\&\*_]{1}[A-Z]{1}[a-z0-9]+/',
            'password_confirmation' =>'same:nd_matKhau_new',
        ],[
            'nd_matKhau_new.required' => 'Mật khẩu không được rỗng',
            'nd_matKhau_new.min' => 'Mật khẩu chứa ít nhất 8 kí tự',
            'nd_matKhau_new.regex' => 'Mật khẩu phải theo định dạng là bắt đầu là 1 kí tự gồm : !@$&*_ theo sau là một chữ hoa và theo sau nữa là chữ cái và số',
            'password_confirmation.same' => 'Xác nhận mật khẩu không chính xác',
        ]);

        $message = "";
        $password = $request->nd_matKhau;
        $user = DB::table('nguoidung')->where("nd_taiKhoan",$request->nd_taiKhoan)->first();
        if(!(Hash::check($password, $user->nd_matKhau))){
            $message = "Mật khẩu cũ không chính xác";
        }
        if($validator->fails() || $message != ""){
            return redirect()->route("password.changepassword")
                        ->withErrors($validator)->with("message_error",$message);
        }

        $change = NguoiDung::find($user->nd_ma);
        $change->nd_matKhau = Hash::make($request->nd_matKhau_new);
        $change->save();

        return redirect()->back()->with("thongbao","Thay đổi mật khẩu thành công");            
    }
}

// Validator thi co the add them with() con validate thi khong dc
//Can create Rule validation nhe
