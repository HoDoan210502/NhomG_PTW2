@extends('adminlayout')
@section('admincontent')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add User
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
                <form role="form" action="{{URL::to('/saveuser')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="User's Name" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="User's Email" name="useremail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User's Password</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="User's Password" name="userpassword">
                    </div>

                    <button type="submit" name="adduser" class="btn btn-info">Add User</button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection