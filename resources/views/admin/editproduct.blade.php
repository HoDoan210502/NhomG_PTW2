@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Category
        </header>
        <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
        <div class="panel-body">
            @foreach($edit_product as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/updateproduct/'.$edit_value->category_id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category's Name</label>
                        <input type="text" value="{{($edit_value->category_name)}}" class="form-control" id="exampleInputEmail1" placeholder="Product's Name" name="productname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category's Description</label>
                        <textarea value="{{($edit_value->category_desc)}}" rows="8" class="form-control" id="exampleInputPassword1" name="productdesc"></textarea>
                    </div>

                    <button type="submit" name="updateproduct" class="btn btn-info">Save Category</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection