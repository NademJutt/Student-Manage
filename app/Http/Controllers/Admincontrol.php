<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;

class Admincontrol extends Controller
{
    public function adminlogin(){
    	return view('adminlogin');
    }

    public function adminloged(Request $request){
    	$admin = admin::where('username',$request->username)->where('password',$request->password)->get
    	  ()->toArray();
    	if ($admin) {
    		$request->session()->put('admin_session',$admin[0]['id']);
    		return redirect('dashboard/');
    	}
    	else{
    		session::flash('coc','Email and Password not match');
    		return redirect('/loginpage/')->withInput();
    	}
    }

    public function dashboard(){
    	return view('dashboard');
    }
}
