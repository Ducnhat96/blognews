@extends('back-end.master')
@section('content')
    @extends('back-end.master')
@section('content')
    <div class="col-md-9">
        <div class="text-center">
            <!-- Add 2 -->
            <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9165454495231653" data-ad-slot="7888465725"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <br>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Catagory</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{!! url('catagory') !!}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! $CatShow['title'] !!}
                </div>
            </div>


        </div>

    </div>

@endsection
@endsection