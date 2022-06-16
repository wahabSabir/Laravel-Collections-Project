@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">First Popular Posts</h1>
    </div>
  </div>
    <div class="row pb-3">
        <div class="col-12">
            <div class="p2 border rounded">
                <p class="d-block mr-3 w-25">{{ $post['data']['ups'] }} Upvotes</p>
                <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
            </div>
        </div>
    </div>
@endsection