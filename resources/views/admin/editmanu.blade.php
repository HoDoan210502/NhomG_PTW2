@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Manufacturer
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
            @foreach($edit_manu as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/updatemanu/'.$edit_value->manu_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Manufacturer's Name</label>
                        <input type="text" value="{{($edit_value->manu_name)}}" class="form-control" id="manuname" maxlength="200" placeholder="Manufacturer's Name" name="manuname" required>
                        <span id="manuname-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manufacturer's Description</label>
                        <textarea value="{{($edit_value->manu_desc)}}" rows="8" class="form-control" maxlength="200" id="manudesc" name="manudesc"></textarea>
                    </div>
                    <button type="submit" name="updatemanu" class="btn btn-info">Save Manufacturer</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var manuname = document.getElementById("manuname").value;
        if (manuname.trim() === "") {
            document.getElementById("manuname-error").textContent = "Manufacturer's Name is required.";
            return false; // Prevent form submission
        } else {
            document.getElementById("manuname-error").textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>
@endsection
