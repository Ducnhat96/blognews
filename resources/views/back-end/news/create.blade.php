@extends('back-end.master')
@section('content')
    <div class="tile">
        @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <button class="close" type="button" data-dismiss="alert">×</button><li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="tile-title">Created News</h3>
        <div class="tile-body">
            <form method="POST" action="{!! url('/news') !!} " enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleSelect1">Catagory</label>
                    <select class="form-control" id="exampleSelect1" name="catagory_id">
                        <option value="" selected>--Chọn danh mục</option>
                        @foreach($catagory as $k=>$value)
                            <option value="{!! $value['id']  !!}"  <?php if (old('catagory_id') == $value['id']) echo 'selected'?> >{!! $value['title'] !!}</option>
                        @endforeach


                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input class="form-control" type="text" placeholder="Enter full title" name="title">
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" rows="4" placeholder="Enter your description" id="description" name="description">{!! old('description') !!}</textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea class="form-control" rows="4" placeholder="Enter your content" id="content" name="content">{!! old('content') !!}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Tag</label>
                    <input class="form-control" type="text" placeholder="Nhập các từ khóa ngăn cách nhau bằng dấu phẩy" name="tag" value="{!! old('tag') !!}">
                </div>

                <div class="form-group">
                    <label class="control-label">Chọn </label>
                    <input class="form-control" type="file" name="newsImg">
                </div>
                <div class="form-group">
                    <label class="control-label">Check_slide</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="check_slide" value="1" checked >Hiển thị
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="check_slide" value="0" <?php if (old('check_slide') == 0) echo 'checked';?> > Không Hiển thi
                        </label>
                    </div>
                </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add News
    </div>
    </form>

@endsection
