<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use ThrottlesLogins;
    public $username='username';
    public $maxAttempts=2;
    //登录表单
    public function login(){
//        dump(Auth::check());
        if(Auth::check()){
            return redirect('admin/index');
        }
        return view('admin.login.login');
    }

    //管理员登录
    public function dologin(Request $request){
        if ($this->hasTooManyLoginAttempts($request)){
            $request->session()->flash('errormsg','错误登录次数过多，请稍后重试！');
            return redirect()->back();
        }
        //表单验证
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:6',
//            'code'=>'required|captcha',
        ],[
//            'code.required'=>trans('validation.required'),
//            'code.captcha'=>trans('validation.captcha'),
        ]);
//        $result = Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password]);
        $result = Auth::attempt(['username'=>$request->username,'password'=>$request->password]);
        if($result){
            if(Auth::user()->status==0){
                $request->session()->flash('errormsg','账户状态异常');
                Auth::logout();
                return redirect()->back();
            }
            return redirect('admin/index');
        }else{
            $request->session()->flash('errormsg','用户名或密码错误');
            $this->incrementLoginAttempts($request);
            return redirect()->back();
        }
    }

    //退出登录
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

    protected function username()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower('admin.'.$request->input($this->username())).'|'.$request->ip();
    }
}
