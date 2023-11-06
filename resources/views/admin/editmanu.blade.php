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
                <form role="form" action="{{URL::to('/updatemanu/'.$edit_value->manu_id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Manufacturer's Name</label>
                        <input type="text" value="{{($edit_value->manu_name)}}" class="form-control" id="exampleInputEmail1" placeholder="Manufacturer's Name" name="manuname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manufacturer's Description</label>
                        <textarea value="{{($edit_value->manu_desc)}}" rows="8" class="form-control" id="exampleInputPassword1" name="manudesc"></textarea>
                    </div>

                    <button type="submit" name="updatemanu" class="btn btn-info">Save Manufacturer</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection