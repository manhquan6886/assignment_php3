<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('account.login');
    }
    public function login(){

    }
    public function saveLogin(Request $request){
        // dd($request->all());
        $rule = [
            'email_login' => 'required|email',
            'password_login' => 'required|',
        ];
        $messages = [
            'email_login.required' => 'Email không được để chống',
            'password_login.required' => 'Password không được để chống',
            'email_login.email' => 'Kiểm tra lại email'
        ];
        $request->validate($rule,$messages);

        $email = $request->email_login;
        $password = $request->password_login;
        if(Auth::attempt([
            'email'=> $email,
            'password' => $password
        ])){
            // dd(Auth::user()->role);
            $role = Auth::user()->role;
            return redirect()->route('client.home')->with('role' , $role);
        }
        else{
            return redirect()->route('login.index')->with('msg', 'Kiểm tra lại email và mật khẩu');
        }
    }

    public function saveSignup(SignupRequest $request){
        // dd($request->all());
        $user = new User();
        // User::create($request->all());
        $user->fill($request->all());
        // $user->password = hash($request->password);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login.index')->with('status', 'Đăng kí thành công. Mời đăng nhập');
        return redirect()->route('client.home');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.home');
    }

    public function forget_password(){
        return view('account.forget-password');
    }


    //admin

    public function show_user(){
        $users = User::select('*')->paginate(10);
        return view('admin.users.all-users',['users'=>$users]);
    }
    public function update_role(User $user){
        // dd($user->role);
        if($user->role == 0){
            $user->update(['role' => 1]);
            
        }
        elseif($user->role == 1){
            $user->update(['role' => 0]);
        }
        return redirect()->route('admin.users.all-users');
    }
}
