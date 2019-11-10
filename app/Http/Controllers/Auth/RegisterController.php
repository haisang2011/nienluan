<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\NguoiDung;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/trangchu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nd_hoTen'     => ['required','string'],
            'nd_email'     => ['required','email','unique:nguoidung'],
            'nd_taiKhoan'  => ['required','unique:nguoidung'],
            'nd_matKhau'   => ['required','min:8','regex:/[\!\@\$\&\*_]{1}[A-Z]{1}[a-z0-9]+/'],
            'nd_ngaySinh'  => ['required'],
            'nd_diaChi'    => ['required'],
            'nd_dienThoai' => ['required','digits:10']
        ],[
            'nd_hoTen.required' => "Họ tên không được rỗng",
            'nd_hoTen.string' => "Họ tên không hợp lệ",
            'nd_email.required' => 'Email không được rỗng',
            'nd_email.email' => 'Đây không phải là email',
            'nd_email.unique' => 'Email đã tồn tại',
            'nd_taiKhoan.required' => 'Tài khoản không được rỗng',
            'nd_taiKhoan.unique' => 'Tài khoản đã tồn tại',
            'nd_matKhau.required' => 'Mật khẩu không được rỗng',
            'nd_matKhau.min' => 'Mật khẩu tối thiểu là 8 kí tự',
            'nd_matKhau.regex' => 'Mật khẩu phải theo định dạng là bắt đầu là 1 kí tự gồm : !@$&*_ theo sau là một chữ hoa và theo sau nữa là chữ cái và số',
            'nd_ngaySinh.required' => 'Ngày sinh không được rỗng',
            'nd_diaChi.required' => 'Địa chỉ không được rỗng',
            'nd_dienThoai.required' => 'Số điện thoại không được rỗng',
            'nd_dienThoai.digits' => 'Đây không phải là số điện thoại'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return NguoiDung::create([
            'nd_hoTen'     => $data['nd_hoTen'],
            'nd_email'     => $data['nd_email'],
            'nd_taiKhoan'  => $data['nd_taiKhoan'],
            'nd_matKhau'   => Hash::make($data['nd_matKhau']),
            'nd_ngaySinh'  => $data['nd_ngaySinh'],
            'nd_diaChi'    => $data['nd_diaChi'],
            'nd_dienThoai' => $data['nd_dienThoai'],
            'nd_taoMoi'    => Carbon::now(),
            'nd_capNhat'   => Carbon::now(),
            'nnd_ma'       => 5
        ]);
    }
}
