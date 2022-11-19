<?php

namespace App\Http\Controllers;

use App\Mail\ContacMail;
use App\Models\AdminAuth;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //dashboard

    public function welcome1(){
        return view('welcome1');
    }

    // display the all details

    public function display(){
        $posts=Contact::simplepaginate(5);
        return view('admin.display',compact('posts'));
    }

    // particular id edit and find the id also get the particular id details

    public function edit($id){
        $edit=Contact::find($id);
        return view('admin.edit',compact('edit'));
    }

    // update the particular details

    public function updateid(Request $request){
        $edit=Contact::find($request->id);
        $edit->firstname=$request->firstname;
        $edit->lastname=$request->lastname;
        $edit->email=$request->email;
        $edit->phonenumber=$request->phonenumber;
        $edit->reason=$request->reason;
        $edit->update();
        return redirect('display')->with('msg','successfully updated');
    }

    // view the particular id
    public function single($id){
        $get=Contact::where('id',$id)->first();
        return view('admin.view',compact('get'));
    }

    // delete the particular id

    public function delete($id){
        Contact::find($id)->delete();
        return back()->with('msg','Successfully deleted');
    }
    public function contactadmin()
    {
        return view('admin.contact');
    }

    // create one contact and data send to email

    public function createadmin(Request $request)
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
        return redirect('/display')->with('msg', 'successfully email send it');
    }


    //admin authentication


    public function regadmin(){
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
            return redirect('/logadmin')->with('msg', 'Registered Successfully please login here!!');
        } else {
            return back()->with('fail', 'failed');
        }
    }

    // show the login page

    public function loginadmin(){
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
}
