@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit User
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
            @foreach($edit_user as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/updateuser/'.$edit_value->user_id)}}" method="post" onsubmit="return validateForm()">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Name</label>
                        <input type="text" value="{{($edit_value->user_name)}}" class="form-control" id="username" maxlength="200" placeholder="User's Name" name="username" required>
                        <span id="username-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Email</label>
                        <input type="email" value="{{($edit_value->user_email)}}" class="form-control" id="useremail" maxlength="200" placeholder="User's Email" name="useremail" required>
                        <span id="useremail-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Password</label>
                        <input type="password" value="{{($edit_value->user_password)}}" class="form-control" id="userpassword" maxlength="200" placeholder="User's Password" name="userpassword" required>
                        <span id="userpassword-error" class="text-danger"></span>
                    </div>

                    <button type="submit" name="updateuser" class="btn btn-info">Save User</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var useremail = document.getElementById("useremail").value;
        var userpassword = document.getElementById("userpassword").value;
        var isValid = true;

        if (username.trim() === "") {
            document.getElementById("username-error").textContent = "User's Name is required.";
            isValid = false;
        } else {
            document.getElementById("username-error").textContent = "";
        }

        if (useremail.trim() === "") {
            document.getElementById("useremail-error").textContent = "User's Email is required.";
            isValid = false;
        } else {
            document.getElementById("useremail-error").textContent = "";
        }

        if (userpassword.trim() === "") {
            document.getElementById("userpassword-error").textContent = "User's Password is required.";
            isValid = false;
        } else {
            document.getElementById("userpassword-error").textContent = "";
        }

        return isValid;
    }
</script>
@endsection
