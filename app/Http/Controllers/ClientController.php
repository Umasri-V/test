<?php

namespace App\Http\Controllers;

use App\Mail\ContacMail;
use App\Mail\ForgotMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function about(){
        return view('client.about');
    }

    public function services(){
        return view('client.services');
    }

    public function login(){
        return view('authen.login');
    }

// authentication method
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $info = User::where('email', '=', $request->email)->first();

        if (!$info) {
            return back()->with('fail', 'we do not recognize ur email');
        } else {
            if (Hash::check($request->password, $info->password)) {
                $request->session()->put('log', $info->id);
                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'incorrect password');
            }
        }
    }

    // logout method

    public function logout()
    {
        if (session()->has('log')) {
            session()->pull('log');
            return redirect('logins');
        }
    }

    public function dashboard()
    {
        return view('authen.dashboard');
    }

    public function register()
    {
        return view('authen.register');
    }

// make one user

    public function make(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required',
            'password' => 'required|min:5',
            'address' => 'required'
        ]);
        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->phonenumber = $request->phonenumber;
        $new->password = Hash::make($request->password);
        $new->address = $request->address;
        $one = $new->save();
        if ($one) {
            return redirect('/logins')->with('msg', 'Registered Successfully please login here!!');
        } else {
            return back()->with('fail', 'failed');
        }
    }

    // contact form details

    public function contact()
    {
        return view('client.contact');
    }

    // create one contact and datas send to email

    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:4',
            'lastname' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'reason' => 'required'
        ]);
        $con = new Contact();
        $con->firstname = $request->firstname;
        $con->lastname = $request->lastname;
        $con->email = $request->email;
        $con->phonenumber = $request->phonenumber;
        $con->reason = $request->reason;
        $con->save();

        Mail::to('umasri.v@ladybirdweb.com')->send(new ContacMail($con));
        return redirect('/clientcontact')->with('msg', 'successfully email send it');
    }

    //display the all details from contact model

    public function viewcontact(){
        $posts=Contact::simplepaginate(6);
        return view('client.display',compact('posts'));
    }

    // It will show the details of whoever is logging in...

    public function profile()
    {
        $data = ['loguser' => User::where('id', session('log'))->first()];
        return view('client.profile', $data);
    }

    //It will show the details of whoever is logging in and edit the particular profile

    public function profileedit($id)
    {
        $edit = User::find($id);
        return view('client.profileedit', compact('edit'));
    }

    // It will show the details of whoever is logging in and
    // update the profile and save the database also

    public function profileupdate(Request $request)
    {
        $edit = User::find($request->id);
        $edit->name = $request->name;
        $edit->email = $request->email;
        $edit->phonenumber = $request->phonenumber;
        $edit->address = $request->address;
        $edit->update();
        return redirect('profile')->with('msg','profile updated successfully');
    }

    /*public function viewpro($id)
    {
        $get = User::where('id', $id)->first();
        return view('profile', compact('get'));
    }*/

    // home page

    public function home()
    {
        return view('client.home');
    }

    // forgot page

    public function forgot()
    {
        return view('client.forgot');
    }

    // reset password

    public function reset(Request $request)
    {
        $email=$request->email;
        $remember_token=$request->remember_token;
        return view('client.resetform',['email'=>$email,'remember_token'=>$remember_token]);
    }

    // handling forgot password
    //send the token and email will be generate the url [$forgot=['body'] this
    //  method so i send the email  i'm using send email and click the link you got the email and token also
    //i am Str::uuid helper method generate uuid

    public function forgotpassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|',
        ]);
        if ($validate->fails()) {
            return 'Validation error';
        } else {
            $remember_token = Str::uuid();
            $get = DB::table('users')->where('email', $request->email)->first();
            $forgot = [
                'body' => route('reset', ['email' => $request->email, 'remember_token' => $remember_token])
            ];
            if ($get) {
                User::where('email', $request->email)->update([
                    'remember_token' => $remember_token,
                ]);

                Mail::to($request->email)->send(new ForgotMail($forgot));
                return back();
            }
        }
    }

    // click the below link will be show the reset password content
    // and reset the password and save the database also
    // after that you login

    public function resetpassword(Request $request){
        $validate=Validator::make($request->all(),[
            'newpassword'=>'required',
            'confirmpassword'=>'required|same:newpassword'
        ],[
            'confirmpassword.same'=>'password did not matched'
        ]);
        if($validate->fails()){
            return 'something went wrong';
        }
        else{
            $user=DB::table('users')->where('email',$request->email)->whereNotNull('remember_token')->where('remember_token',$request->remember_token);

            if($user){
                User::where('email',$request->email)->update([
                    'password'=>Hash::make($request->newpassword),
                    'remember_token'=>null
                ]);
                return redirect('/logins');
            }
        }
    }
}
