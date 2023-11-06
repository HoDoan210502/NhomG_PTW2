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
                <form role="form" action="{{URL::to('/updateuser/'.$edit_value->user_id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Name</label>
                        <input type="text" value="{{($edit_value->user_name)}}" class="form-control" id="exampleInputEmail1" placeholder="User's Name" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Email</label>
                        <input type="email" value="{{($edit_value->user_email)}}" class="form-control" id="exampleInputEmail1" placeholder="User's Email" name="useremail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Password</label>
                        <input type="password" value="{{($edit_value->user_password)}}" class="form-control" id="exampleInputEmail1" placeholder="User's Password" name="userpassword">
                    </div>

                    <button type="submit" name="updateuser" class="btn btn-info">Save User</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection