<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;

class SessionsController extends Controller
{
    //登入
    public function create()
    {
        return view('sessions.create');
    }

    //登录验证
    public function store(Request $request)
    {
        $credentials =$this->validate($request,[
            'email' =>'required|email|max:255'
            ,'password'=>'required'
        ]);

        if (Auth::attempt($credentials,$request->has('remember'))){
            //登录成功后的相关操作
            session()->flash('success','欢迎回来！');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            //登入失败的相关操作
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    //退出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('login');
    }
}
