@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            All Manufacturer
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
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
                        <th>Manufacturer's Name</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_manu as $key => $pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{($pro->manu_name)}}</td>
                        <td><?php
                            if ($pro->manu_status == 0) {
                            ?>
                                <a href="{{URL::to('/hidemanu/'.$pro->manu_id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                            <?php
                            } else {
                            ?>
                                <a href="{{URL::to('/showmanu/'.$pro->manu_id)}}">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </i>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>{{($pro->manu_desc)}}</td>
                        <td>
                            <a href="{{URL::to('/editmanu/'.$pro->manu_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-pencil text-success text-active">
                                    </i></button></a>
                            <a onclick="return confirm('Are u sure about that????')" href="{{URL::to('/deletemanu/'.$pro->manu_id)}}" class="active" ui-toggle-class="">
                                <button><i class="fa fa-times text-danger text">
                                    </i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <footer class="panel-footer">
        {{ $all_manu->links('pagination::bootstrap-4', ['prev_text' => '', 'next_text' => '']) }}
        </footer>
    </div>
</div>
@endsection