@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">Posts</h1>
    </div>
    @foreach($posts as $chunk)
    <div class="row pb-3">
        @foreach($chunk as $post)
        <div class="col-6">
            <div class="p2 border rounded">
                <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
  </div>
@endsection