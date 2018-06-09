<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
                'email' => 'required|email|max:255',
                'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '登录成功！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '邮箱或密码不匹配');
            return redirect('/login')->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '成功退出！');
        return redirect('login');
    }
}
