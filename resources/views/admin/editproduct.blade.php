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
                <form role="form" action="{{URL::to('/updateproduct/'.$edit_value->category_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category's Name</label>
                        <input type="text" value="{{($edit_value->category_name)}}" class="form-control" id="productname" maxlength="200" placeholder="Category's Name" name="productname" required>
                        <span id="productname-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category's Description</label>
                        <textarea value="{{($edit_value->category_desc)}}" rows="8" class="form-control" id="productdesc" maxlength="200" name="productdesc"></textarea>
                    </div>

                    <button type="submit" name="updateproduct" class="btn btn-info">Save Category</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var productname = document.getElementById("productname").value;
        if (productname.trim() === "") {
            document.getElementById("productname-error").textContent = "Category's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("productname-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection
