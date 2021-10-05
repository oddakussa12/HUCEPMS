{{-- @extends('layouts.app')

@section('content')

<div class="home">
    <div class="row" style="margin-top:15%;">
        <div class="col-sm-12 text-center">
            <h4 class="text-gray-700 uppercase font-bold">upload recipt</h4>
            <form method = "post" action="/uploadrecipt" style="margin-top:20px;" enctype="multipart/form-data">
                @csrf
                <input type="file" name="recipt" class="form-control"/>
                <button type="submit" class="btn btn-success" style="margin-top:30px;">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.nonAuthApp')
@section('style')
<style type="text/css">
    .card-default {
        color: #333;
        background: linear-gradient(#fff,#ebebeb) repeat scroll 0 0 transparent;
        font-weight: 600;
        border-radius: 6px;
    }
</style>

@endsection
@section('content')
<div class="container-fluid" style="margin-top:20px;padding-bottom:100px;">
    {{-- main content --}}
    <div class="container" style="margin-top:20px;max-width:500px;height:200px;">
        <div id="accordion" style="margin-top:120px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Upload Receipt</h3>
                        @include('flash-message')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form method = "post" action="/uploadrecipt" style="margin-top:20px;width:500px;padding-bottom:30px;" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="recipt" class="form-control"/>
                            <button type="submit" class="btn btn-success" style="margin-top:30px;width:120px;">Upload</button>
                        </form>
                        <span style="margin-top:100px;color:red;font-size:12px;">Note: Reuploading receipt will replace the existing one</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

