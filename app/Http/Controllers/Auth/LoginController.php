<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/client/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        $form = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($form)){
            $user= Auth::user();
            $request->session()->regenerate();
            $request->session()->put([
                'user_email'=>$user->email,
                'user_password'=>$user->password
            ]);
            return redirect()->intended('client/home');
        }
        return back()->withErrors([
            'email' => 'Email hoặc password không đúng',
        ])->onlyInput('email');
    }
    public function showLoginForm()
    {
         if (Auth::check()) {
        return redirect('/client/home');
    }
        return view('auth.login');
    }
    public function logout(Request $request)
{
    // Lấy thông tin người dùng
    $user = Auth::user();

    // Đăng xuất người dùng
    Auth::logout();

    // Xóa thông tin người dùng khỏi session
    $request->session()->forget(['user_name', 'user_email']);

    // Hủy session và tái tạo token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}
