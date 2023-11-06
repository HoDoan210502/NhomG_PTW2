<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function toCart(Request $request){
        $product_id = $request->product_id_hidden;
        $quantity = $request->qty;

        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id', 'desc')->get();
        $manu_product = DB::table('tbl_manu')->where('manu_status','0')->orderBy('manu_id', 'desc')->get();

        $data = DB::table('tbl_sanpham')->where('product_id',$product_id)->get();

        

        return view('cart.cart')->with('category',$cate_product)->with('manu',$manu_product);

    }
}
