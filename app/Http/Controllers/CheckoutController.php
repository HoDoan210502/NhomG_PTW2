<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
   public function checkout(Request $request){
        return view('cart.checkout');
   }

}
