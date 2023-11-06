<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    //Admin Login
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send(); 
        }
    }

    public function index()
    {
        return view('adminlogin');
    }
    public function showdashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($result) {
            // Đăng nhập thành công, xuất ra màn hình
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->id);
            return $this->showdashboard();
        } else {
            Session::put('message', 'Email hoặc mật khẩu sai');
            // Đăng nhập không thành công, chuyển hướng về trang admin
            return redirect('/admin');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect('/admin');
    }
}
