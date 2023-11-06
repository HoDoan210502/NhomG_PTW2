@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Product
        </header>
        <div class="panel-body">
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                @foreach($editsp as $key => $pro)
                <form role="form" action="{{URL::to('/updatesp/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="spimage">
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" width="80px" height="80px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}" Name" name="spname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Categories</label>
                        <select name="product_cate" class="form-control m-bot15">
                            @foreach($cate_product as $key => $cate)
                            <option selected value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manufacturer</label>
                        <select name="product_manu" class="form-control m-bot15">
                            @foreach($manu_product as $key => $manu)
                            <option selected value="{{($manu->manu_id)}}">{{($manu->manu_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}" name="spprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="spstatus" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product's Description</label>
                        <textarea style="resize: none" type="password" rows="8" class="form-control" id="exampleInputPassword1" name="spdesc">{{$pro->product_desc}}</textarea>
                    </div>

                    <button type="submit" name="updatesp" class="btn btn-info">Save Product</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>
</div>
@endsection