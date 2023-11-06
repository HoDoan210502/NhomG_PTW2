<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send(); 
        }
    }

    //Add User
    public function addUser()
    {
        $this->AuthLogin();
        return view('admin.adduser');
    }

    //All User
    public function allUser()
    {
        $this->AuthLogin();
        $all_user = DB::table('tbl_user')->paginate(3);
        return view('admin.alluser')->with('all_user', $all_user);
    }

    //Save User
    public function saveUser(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['user_name'] = $request->username;
        $data['user_email'] = $request->useremail;
        $data['user_password'] = md5($request->userpassword);

        DB::table('tbl_user')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.adduser');
    }

    //Edit User
    public function editUser($userid)
    {
        $this->AuthLogin();
        $edit_user = DB::table('tbl_user')->where('user_id', $userid)->get();
        return view('admin.edituser')->with('edit_user', $edit_user);
    }

    //Update User
    public function updateUser(Request $request, $userid)
    {
        $this->AuthLogin();
        $data = array();
        $data['user_name'] = $request->username;
        $data['user_email'] = $request->useremail;
        $data['user_password'] = md5($request->userpassword);
        DB::table('tbl_user')->where('user_id',$userid)->update($data);
        Session::put('message', 'Cập nhật user thành công');
        return view('admin.dashboard');
    }

    //Delete User
    public function deleteUser($userid)
    {
        $this->AuthLogin();
        DB::table('tbl_user')->where('user_id',$userid)->delete();
        Session::put('message', 'Xoá user thành công');
        return view('admin.dashboard');
    }
}
