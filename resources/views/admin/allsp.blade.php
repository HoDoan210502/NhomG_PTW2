@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            All Product
        </div>
        <div class="table-responsive">
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text_message">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Product's Image</th>
                        <th>Product's Name</th>
                        <th>Categories</th>
                        <th>Manufacturer</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_sp as $key => $pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><img src="public/uploads/product/{{$pro->product_image}}" alt="" width="80px" height="80px"></td>
                        <td>{{($pro->product_name)}}</td>
                        <td>{{($pro->category_name)}}</td>
                        <td>{{($pro->manu_name)}}</td>
                        <td>{{($pro->product_price)}}</td>
                        <td><?php
                            if ($pro->product_status == 0) {
                            ?>
                                <a href="{{URL::to('/hidesp/'.$pro->product_id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                            <?php
                            } else {
                            ?>
                                <a href="{{URL::to('/showsp/'.$pro->product_id)}}">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </i>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>{{($pro->product_desc)}}</td>
                        <td>
                            <a href="{{URL::to('/editsp/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-pencil text-success text-active">
                                    </i></button></a>
                            <a onclick="return confirm('Are u sure about that????')" href="{{URL::to('/deletesp/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-times text-danger text">
                                    </i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <footer class="panel-footer">
            {{ $all_sp->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
        </footer>
    </div>
</div>
@endsection