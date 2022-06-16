@extends('layout.default')
@section('content')
  <div class="row pt-3">
    <div class="col-12">
        <h1 class="h3">Grouped Posts Via WhereIN</h1>
    </div>
  </div>
  @foreach($posts as $type => $children)
      @include('collections.groupby.' . $type)
  @endforeach
@endsection






Route::get('/', [CollectionController::class,'index']);
Route::get('/filter', [CollectionController::class,'filter']);
Route::get('/pluck', [CollectionController::class,'pluck']);
Route::get('/contains', [CollectionController::class,'contains']);
Route::get('/groupby', [CollectionController::class,'groupby']);
Route::get('/sortby', [CollectionController::class,'sortby']);
// we want to split up our post based on collection this is the beauty of partition
Route::get('/partition', [CollectionController::class,'partition']);
Route::get('/reject', [CollectionController::class,'reject']);
Route::get('/wherein', [CollectionController::class,'wherein']);
Route::get('/chunk', [CollectionController::class,'chunk']);
// super simple method called count
Route::get('/count', [CollectionController::class,'count']);
// first method return only on character which is first
Route::get('/first', [CollectionController::class,'first']);
Route::get('/tap', [CollectionController::class,'tap']);

Route::get('/filters', [CollectionsController::class,'filters']);
Route::get('/averages', [CollectionsController::class,'averages']);
Route::get('/max', [CollectionsController::class,'max']);
Route::get('/median', [CollectionsController::class,'median']);
Route::get('/min', [CollectionsController::class,'min']);
Route::get('/collapse', [CollectionsController::class,'collapse']);
Route::get('/combine', [CollectionsController::class,'combine']);
Route::get('/concat', [CollectionsController::class,'concat']);
Route::get('/contain', [CollectionsController::class,'contain']);
Route::get('/containstrict', [CollectionsController::class,'containstrict']);
Route::get('/map', [CollectionsController::class,'map']);
Route::get('/diff', [CollectionsController::class,'diff']);

// Test for Laravel Collections











// Collections is a useful feature for laravel framework. Collection work like php array but it is more convenient.
// It uses the Illuminate\Support\Collection class to use it.Collections allows you to create a chain of methods to modify and reduces array.
// Avoid the Braces means some of the braces have more than 10 arrays which can be difficult to track so laraval collection has replaced it with collect(array1)-> merge(array2)->sort()->shuffle();
// Usage of Api is unified. .. Deal with multiple layer array .. Process the Key-value better.



<!--
use App\HTTP\Controllers\CollectionController;
use App\HTTP\Controllers\CollectionsController; -->