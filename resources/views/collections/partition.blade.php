@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">Partitioned Posts</h1>
    </div>
    <h4>Popular Posts</h4>
    @foreach($popularPosts as $post)
    <div class="row pb-3">
        <div class="col-12">
            <div class="p2 border rounded">
                <p class="d-block mr-3 w-25">{{ $post['data']['ups'] }} Upvotes</p>
                <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
            </div>
        </div>
    </div>
</div>
    @endforeach
    <h4 class="mt-4">Regular Posts</h4>
    @foreach($regularPosts as $post)
    <div class="row pb-3">
        <div class="col-12">
            <div class="p2 border rounded">
                <p class="d-block mr-3 w-25">{{ $post['data']['ups'] }} Upvotes</p>
                <a href="{{ $post['data']['url'] }}" class="d-block font-weight-bold">{{ $post['data']['title'] }}</a>
            </div>
        </div>
    </div>
    @endforeach
  </div>
@endsection