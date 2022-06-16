@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">Contains Posts Images</h1>
    </div>
    @foreach($images as $image)
    <div class="row pb-3">
        <div class="col-12">
            <div class="p2 border rounded d-flex">
                <img class="mw-100" src="{{ $image }}">
            </div>
        </div>
    </div>
    @endforeach
  </div>
@endsection