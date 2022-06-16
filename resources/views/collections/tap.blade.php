@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">Tapped Posts</h1>
    </div>
    @foreach($posts as $post)
    <div class="row pb-3">
        <div class="col-12">
            <div class="p2 border rounded">
                <img class="d-block mr-3" src="{{ $post['data']['thumbnail']}}" width="70">
                <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
            </div>
            <br><br><br>
        </div>
    </div>
    @endforeach
  </div>
@endsection