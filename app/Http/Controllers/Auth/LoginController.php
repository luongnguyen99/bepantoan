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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormLogin(){
        return view('admin.login');
    }

    public function saveLogin(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email không đƯợc để trống',
                'email.email' => 'Vui lòng nhập đúng định dạng email',
                'email.exists' => 'Email không tồn tại',

                'password.required' => 'Mật khẩu không được để trống',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            if (!empty($request->remember)) {
                $remember = true;
            }else{
                $remember = false;
            }
            Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember);
            return redirect()->route('admin.home');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home_client');
    }
}
