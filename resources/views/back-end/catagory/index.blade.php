@extends('back-end.master')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Catagory</h1>
        </div>
        @if (Session::has('flash_add'))
            <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Well done!</strong> {!! Session::get('flash_add') !!}
            </div>
        @endif
        <div class="pull-right">
            <a class="btn btn-success" href="{!! url('catagory/create') !!}"> Create New Catagory</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">List Catagory</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($catagory as $k=> $value)
                        <tr >
                            <td>{!! $k +1 !!}</td>
                            <td>{!! $value['title'] !!}</td>
                            <td>{!! $value['slug'] !!}</td>
                            <form action="{!! url('catagory/'.$value['id']) !!}" method="POST">
                                {{ csrf_field() }}
                                {!! method_field('DELETE')!!}
                                <td style="position: relative">
                                    <div class="btn-group" style="position: absolute;top: 4px">
                                        <a class="btn btn-primary" href="{!! url('catagory/'.$value['id']) !!}" title="Show"><i class="fa fa-sign-out" ></i></a>
                                        <a class="btn btn-primary" href="{!! url('catagory/'.$value['id'].'/edit') !!}" title="Edit"><i class="fa fa-lg fa-edit"></i></a>
                                        <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure')" title="Delete"><i class="fa fa-lg fa-trash"></i></button>
                                    </div>
                                </td>
                            </form>


                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
