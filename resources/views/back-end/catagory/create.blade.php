@extends('back-end.master')
@section('content')
    <div class="row" style="margin:0px auto;">
        <div class="col-md-9">
            <div class="text-center">
                <!-- Add 2 -->
                <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9165454495231653" data-ad-slot="7888465725"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <br>
            </div>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <button class="close" type="button" data-dismiss="alert">×</button><li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create New Item</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="#"> Back</a>
                    </div>
                </div>
            </div>

            <form method="POST" action="{!! url('/catagory') !!}" accept-charset="UTF-8">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input placeholder="Title" class="form-control" name="title" type="text" value="{!! old('title') !!}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-3">
            <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- for demo -->
            <ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-9165454495231653" data-ad-slot="4041737328"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
@endsection