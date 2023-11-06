@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Product
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
                <form role="form" action="{{URL::to('/savesp')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="spimage">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product's Name" name="spname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Categories</label>
                        <select name="product_cate" class="form-control m-bot15">
                            @foreach($cate_product as $key => $cate)
                            <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manufacturer</label>
                        <select name="product_manu" class="form-control m-bot15">
                            @foreach($manu_product as $key => $manu)
                            <option value="{{($manu->manu_id)}}">{{($manu->manu_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product's Price" name="spprice">
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
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" placeholder="Description" name="spdesc"></textarea>
                    </div>

                    <button type="submit" name="addsp" class="btn btn-info">Add Product</button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection