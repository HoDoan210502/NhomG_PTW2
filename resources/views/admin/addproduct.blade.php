@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Category
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
                <form role="form" action="{{URL::to('/saveproduct')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product's Name" name="productname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="productstatus" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category's Description</label>
                        <textarea type="password" rows="8" class="form-control" id="exampleInputPassword1" placeholder="Description" name="productdesc"></textarea>
                    </div>

                    <button type="submit" name="addproduct" class="btn btn-info">Add Category</button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection