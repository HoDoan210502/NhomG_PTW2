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
                        <input type="file" class="form-control" id="spimage" name="spimage" onchange="validateFileType(this)" accept=".png, .jpg">
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" width="80px" height="80px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" maxlength="200" value="{{$pro->product_name}}" Name" name="spname">
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
                        <input type="number" class="form-control" id="exampleInputEmail1" maxlength="200" value="{{$pro->product_price}}" name="spprice">
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
                        <textarea style="resize: none" maxlength="200" type="password" rows="8" class="form-control" id="exampleInputPassword1" name="spdesc">{{$pro->product_desc}}</textarea>
                    </div>

                    <button type="submit" name="updatesp" class="btn btn-info">Save Product</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>
</div>
<script>
    document.getElementById('spimage').addEventListener('change', function () {
        var fileInput = document.getElementById('spimage');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.png|\.jpg)$/i;
        
        if (!allowedExtensions.exec(filePath)) {
            alert('Chỉ được chọn tệp có đuôi .png hoặc .jpg.');
            fileInput.value = ''; // Xóa giá trị trường nhập file
        }
    });
    function validateForm() {
        var spimage = document.getElementById('spimage');
        var saveButton = document.getElementById('saveButton');

        if (spimage.files.length === 0) {
            alert('Bạn phải chọn một hình ảnh sản phẩm.');
            return false;
        }

        // Bỏ vô hiệu hóa nút "Save Product" nếu hình ảnh đã được chọn
        saveButton.disabled = false;
        return true;
    }
</script>
@endsection