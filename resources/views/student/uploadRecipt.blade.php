@extends('layouts.app')

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
@endsection
