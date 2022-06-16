<h2 class="h4">Self Posts</h2>
@foreach($children as $post)
   <div class="row pb-3">
      <div class="col-12">
         <div class="p-2 border rounded">
           <p> {!! html_entity_decode($post['data']['selftext_html']) !!}</p>
         </div>
      </div>
   </div>
@endforeach