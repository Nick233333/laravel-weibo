<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    /**
     * SessionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', [
                'only' => ['create']
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
                'email' => 'required|email|max:255',
                'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if(Auth::user()->activated) {
                session()->flash('login', true);
                return redirect()->intended(route('users.show', [Auth::user()]));
            } else {
                Auth::logout();
                session()->flash('warning', '你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/');
            }
        } else {
            session()->flash('danger', '邮箱或密码不匹配');
            return redirect('/login')->withInput();
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '成功退出！');
        return redirect('login');
    }

}
