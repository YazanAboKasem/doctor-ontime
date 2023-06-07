<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }
    public function showLoginForm()
    {
        $page_title = "Admin Login";
        return view('admin.auth.login', compact('page_title'));
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
           // if($user->is_admin == 1){
               // dd("sdfgdfg");
                return redirect()->route('admin.dashboard')->with('success','You are Logged in sucessfully.');
          //  }
        }else {
            dd("sdfgdfg");
          //  return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
}
