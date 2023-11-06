<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ManuController extends Controller
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

    //Add Manu
    public function addManu()
    {
        $this->AuthLogin();
        return view('admin.addmanu');
    }

    //All Manu
    public function allManu()
    {
        $this->AuthLogin();
        $all_manu = DB::table('tbl_manu')->paginate(3);
        return view('admin.allmanu')->with('all_manu', $all_manu);
    }

    //Save Manu
    public function saveManu(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['manu_name'] = $request->manuname;
        $data['manu_status'] = $request->manustatus;
        $data['manu_desc'] = $request->manudesc;

        DB::table('tbl_manu')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.addmanu');
    }

    //Show Manu
    public function showManu($manuid)
    {
        $this->AuthLogin();
        DB::table('tbl_manu')->where('manu_id', $manuid)->update(['manu_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của sản hãng thành công');
        return view('admin.dashboard');
    }

    //Hide Manu
    public function hideManu($manuid)
    {
        $this->AuthLogin();
        DB::table('tbl_manu')->where('manu_id', $manuid)->update(['manu_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của sản hãng thành công');
        return view('admin.dashboard');
    }

    //Edit Manu
    public function editManu($manuid)
    {
        $this->AuthLogin();
        $edit_manu = DB::table('tbl_manu')->where('manu_id', $manuid)->get();
        return view('admin.editmanu')->with('edit_manu', $edit_manu);
    }

    //Update Manu
    public function updateManu(Request $request, $manuid)
    {
        $this->AuthLogin();
        $data = array();
        $data['manu_name'] = $request->manuname;
        $data['manu_desc'] = $request->manudesc;
        DB::table('tbl_manu')->where('manu_id',$manuid)->update($data);
        Session::put('message', 'Cập nhật hãng thành công');
        return view('admin.dashboard');
    }

    //Delete Manu
    public function deleteManu($manuid)
    {
        $this->AuthLogin();
        DB::table('tbl_manu')->where('manu_id',$manuid)->delete();
        Session::put('message', 'Xoá hãng thành công');
        return view('admin.dashboard');
    }

    //Show in home
    public function showInHome($manuid){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id', 'desc')->get();
        $manu_product = DB::table('tbl_manu')->where('manu_status','0')->orderBy('manu_id', 'desc')->get();

        $manu_by_id = DB::table('tbl_sanpham')->join('tbl_manu','tbl_sanpham.manu_id','=','tbl_manu.manu_id')->where('tbl_sanpham.manu_id',$manuid)->paginate(6);
        return view('manu.showmanu')->with('category',$cate_product)->with('manu',$manu_product)->with('manu_by_id',$manu_by_id);
    }

    
}
