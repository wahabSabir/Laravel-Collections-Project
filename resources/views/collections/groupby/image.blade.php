<h2 class="h4">Images Posts</h2>
<!-- For images just show the images in the url -->
@foreach($children as $post)
   <div class="row pb-3">
      <div class="col-12">
         <div class="p-2 border rounded">
            <img class="mw-100" src="{{ $post['data']['url'] }}">
        </div>
      </div>
   </div>
@endforeach