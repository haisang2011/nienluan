<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'nd_taiKhoan';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nd_taiKhoan'    => 'required',
            'nd_matKhau' => 'required',
        ], [
            'nd_taiKhoan.required' => 'Tài khoản không được rỗng',
            'nd_matKhau.required' => 'Mật khẩu không được rỗng',
        ]);
        if (Auth::attempt(['nd_taiKhoan' => $request->nd_taiKhoan, 'password'=> $request->nd_matKhau])) {
            if($request->exists('path'))
                return redirect($request->path);
            return redirect()->route("Frontend.index");
        }
        // return redirect()->back()
        //     ->withInput()
        //     ->withErrors([
        //         'nd_taiKhoan' => 'Sai tài khoản hoặc mật khẩu',
        //     ]);
        return redirect()->back()
            ->withInput()->with("thongbao", "Sai tài khoản hoặc mật khẩu");
            
    }

    public function logout(Request $request)
    {
        if(isset($_SEESION['duongdan']))
            unset($_SESSION['duongdan']);

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/trangchu');
    }
}