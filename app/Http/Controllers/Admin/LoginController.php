<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    /**
     * Hiển thị view login
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
    	return view('admin.login.login');
    }

    /**
     * Thực hiện việc Login
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response]
     */
    public function postLogin(Request $request)
    {
    	$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
    	]);

    	$bool =  Auth::attempt(['email' => $request->email, 'password' => $request->password]);

    	if($bool) {
    		return redirect('admin');
    	}
    	else {
    		return redirect()->back()->with('danger', 'Email hoặc mật khẩu không chính xác!');
    	}
    }

    /**
     * thực hiện việc logout
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
    	Auth::logout();
    	return redirect('admin/login');
    }
}
