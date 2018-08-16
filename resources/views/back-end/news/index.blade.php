@extends('back-end.master')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>News List</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{!! url('news/create') !!}"> Create New Posts</a>
        </div>
    </div>
    @if (Session::has('flash_add'))
        <div class="alert alert-dismissible alert-success">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Well done!</strong> {!! Session::get('flash_add') !!}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable"
                                       role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 2%">STT
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 98px;">Image
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 142px;">
                                            Title
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 10%;">Catagory
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 13%;">Check Slide
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 16%;">Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($news as $item)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{!! $item['id'] !!}</td>
                                            <td><img src="{!! asset('back-end/image/'.$item['image_url']) !!}" alt="..."
                                                     class="img-rounded profile_img" style="width: 200px"></td>
                                            <td><p class="catagory">{!! $item['title'] !!}</p></td>
                                            <td>
                                                <p class="catagory_news">{!! $news1 = App\Repositories\News\News::find($item['catagory_id'])->catagory->title; !!}</p>
                                            </td>
                                            <td><p class="catagory_news"><?php if ($item['check_slide'] == 0) {
                                                        echo 'Không hiển thị';
                                                    } else {
                                                        echo 'Hiển thị';
                                                    }?></p></td>
                                            <form action="{!! url('news/'.$item['id']) !!}" method="POST">
                                                {{ csrf_field() }}
                                                {!! method_field('DELETE')!!}
                                                <td style="position: relative">
                                                    <div class="btn-group" style="position: absolute;top: 42px">
                                                        <a class="btn btn-primary"
                                                           href="{!! url('news/'.$item['id']) !!}" title="Show"><i
                                                                    class="fa fa-sign-out"></i></a>
                                                        <a class="btn btn-primary"
                                                           href="{!! url('news/'.$item['id'].'/edit') !!}" title="Edit"><i
                                                                    class="fa fa-lg fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-primary"
                                                                onclick="return confirm('Are you sure')" title="Delete">
                                                            <i class="fa fa-lg fa-trash"></i></button>
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
                </div>
            </div>
        </div>
    </div>
@endsection