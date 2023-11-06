<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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

    //Add San Pham
    public function addSP()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
        $manu_product = DB::table('tbl_manu')->orderBy('manu_id', 'desc')->get();
        return view('admin.addsp')->with('cate_product', $cate_product)->with('manu_product', $manu_product);
    }
    
    //All San Pham
    public function allSP()
    {
        $this->AuthLogin();
        $all_sp = DB::table('tbl_sanpham')->join('tbl_category', 'tbl_sanpham.category_id', '=', 'tbl_category.category_id')->join('tbl_manu', 'tbl_sanpham.manu_id', '=', 'tbl_manu.manu_id')->orderBy('tbl_sanpham.product_id','desc')->paginate(3);

        return view('admin.allsp')->with('all_sp', $all_sp);
    }

    //Luu San Pham
    public function saveSP(Request $request)
    {
        $this->AuthLogin();
        $data = array();

        $data['category_id'] = $request->product_cate;
        $data['manu_id'] = $request->product_manu;
        $data['product_name'] = $request->spname;
        $data['product_price'] = $request->spprice;
        $data['product_status'] = $request->spstatus;
        $data['product_desc'] = $request->spdesc;

        $get_image = $request->file('spimage');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_sanpham')->insert($data);
            return view('admin.dashboard');
        }
        $data['product_image'] = '';
        DB::table('tbl_sanpham')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return view('admin.addsp');
    }

    //Hien Thi San Pham
    public function showSP($spid)
    {
        $this->AuthLogin();
        DB::table('tbl_sanpham')->where('product_id', $spid)->update(['product_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của sản phẩm thành công');
        return view('admin.dashboard');
    }

    //An San Pham
    public function hideSP($spid)
    {
        $this->AuthLogin();
        DB::table('tbl_sanpham')->where('product_id', $spid)->update(['product_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của sản phẩm thành công');
        return view('admin.dashboard');
    }

    //Sua San Pham
    public function editSP($spid)
    {
        $this->AuthLogin();
         $cate_product = DB::table('tbl_category')->orderBy('category_id','desc')->get();
         $manu_product = DB::table('tbl_manu')->orderBy('manu_id','desc')->get();
        
         $editsp = DB::table('tbl_sanpham')->where('product_id', $spid)->get();
         $manager_product = view('admin.editsp')->with('editsp',$editsp)->with('cate_product',$cate_product)->with('manu_product',$manu_product);
         return view('adminlayout')->with('admin.editsp',$manager_product);
    }

    //Cap Nhat San Pham
    public function updateSP(Request $request, $spid)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_id'] = $request->product_cate;
        $data['manu_id'] = $request->product_manu;
        $data['product_name'] = $request->spname;
        $data['product_price'] = $request->spprice;
        $data['product_status'] = $request->spstatus;
        $data['product_desc'] = $request->spdesc;
        $get_image = $request->file('spimage');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_sanpham')->where('product_id',$spid)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return view('admin.addproduct');
        }
        DB::table('tbl_sanpham')->where('product_id', $spid)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return view('admin.dashboard');
    }

    //Xoa San Pham
    public function deleteSP($spid)
    {
        $this->AuthLogin();
        DB::table('tbl_sanpham')->where('product_id', $spid)->delete();
        Session::put('message', 'Xoá sản phẩm thành công');
        return view('admin.dashboard');
    }

    public function detailProduct($spid){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id', 'desc')->get();
        $manu_product = DB::table('tbl_manu')->where('manu_status','0')->orderBy('manu_id', 'desc')->get();

        $detail = DB::table('tbl_sanpham')->join('tbl_category', 'tbl_sanpham.category_id', '=', 'tbl_category.category_id')->join('tbl_manu', 'tbl_sanpham.manu_id', '=', 'tbl_manu.manu_id')->where('tbl_sanpham.product_id', $spid)->get();

        return view('product.detail')->with('category',$cate_product)->with('manu',$manu_product)->with('detail',$detail);
    }
}
