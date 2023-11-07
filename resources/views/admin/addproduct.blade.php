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
                <form role="form" action="{{URL::to('/saveproduct')}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category's Name" name="productname" maxlength="200" required>

                        <span id="productname-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for "exampleInputPassword1">Status</label>
                        <select name="productstatus" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category's Description</label>
                        <textarea rows="8" class="form-control" id="exampleInputPassword1" maxlength="200" placeholder="Description" name="productdesc"></textarea>
                    </div>

                    <button type="submit" name="addproduct" class="btn btn-info">Add Category</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var productname = document.getElementById("exampleInputEmail1").value;
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
