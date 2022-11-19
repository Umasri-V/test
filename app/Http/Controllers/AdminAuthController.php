<?php

namespace App\Http\Controllers;

use App\Models\AdminAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*class AdminAuthController extends Controller
{
    // show the register page

    public function reg(){
        return view('admin.reg');
    }

    // make one user id
    // save the database
    public function save(Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $new = new AdminAuth();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        $one = $new->save();
        if ($one) {
            return redirect('/log')->with('msg', 'Registered Successfully please login here!!');
        } else {
            return back()->with('fail', 'failed');
        }
    }

    // show the login page

    public function login(){
        return view('admin.log');
    }

    // check the authentication
    // and login
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $info = AdminAuth::where('email', '=', $request->email)->first();

        if (!$info) {
            return back()->with('fail', 'we do not recognize ur email');
        } else {
            if (Hash::check($request->password, $info->password)) {
                $request->session()->put('log', $info->id);
                return redirect('/display');
            } else {
                return back()->with('fail', 'incorrect password');
            }
        }
    }
}*/
