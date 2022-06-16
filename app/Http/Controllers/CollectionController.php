<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    private $posts;

    public function __construct()
    {
        // $json = Http::get(url:'https://www.reddit.com/r/AskReddit.json')
        $json = Http::get(url:'https://www.reddit.com/r/MechanicalKeyboards.json')
                ->json();
        $this->posts = collect($json['data']['children']);
    }
    public function index()
    {
        return view('collections.index',[
            'posts' => $this->posts
        ]);
    }

    // Filter can filter the data in an array Filter know which data is filter through callback function Fro first we can pass array then in callback function we pass value and key(index means 0) then the data is filter one by one based on condition
    public function filter()
    {
        $posts = $this->posts->filter(function($post, $key) // Current item collection and key
        {
        //    return false; // skip this posts;
        //    return true; // keep this posts;
        // return $posts['data']['post_hint'] === 'image';
        if($post['data']['post_hint'] != 'image'){
            return false;
        }

        return \Str::contains($post['data']['url'], 'i.redd.it');

        });
        return view('collections.filter',[
          'posts' => $posts
        ]);
    }

    public function pluck()
    {
        $images = $this->posts->filter(function($post, $key) // Current item collection and key
        {
        if($post['data']['post_hint'] != 'image'){
            return false;
        }

        return \Str::contains($post['data']['url'], 'i.redd.it');

        })
        ->pluck(value: 'data.url')
        ->all();
        return view('collections.pluck',[
          'images' => $images
        ]);
    }

    public function contains()
    {
        if(!$this->posts->contains(key: 'data.post_hint', operator: 'image')){
            // this will return the simple value true or false
            return view(view: 'collections.contains-empty');

        }
        $images = $this->posts->filter(function($post, $key) // Current item collection and key
        {
        if($post['data']['post_hint'] != 'image'){
            return false;
        }
        return \Str::contains($post['data']['url'], 'i.redd.it');
        })
        ->pluck(value: 'data.url')
        ->all();
        // to show different view if no post is exit
        return view('collections.contains',[
          'images' => $images
        ]);
    }

    public function groupby()
    {
        $posts = $this->posts->filter(function($post,$key)
        {
            return in_array($post['data']['post_hint'],['self','image']);
        })
        ->groupBy(groupBy: 'data.post_hint')
        ->toArray(); // return the collection as an array
        // return $posts;
        return view('collections.groupby', [
            'posts' => $posts
        ]);
    }

    public function sortby()
    {
        //The sortBy method sorts the collection by the given key. The sorted collection keeps the original array keys, so in the following example we will use the values method to reset the keys to consecutively numbered indexes:
        $posts = $this->posts->filter(function($post,$key)
        {
            return $post['data']['post_hint'] = 'image';
        })
        ->sortBy(callback: 'data.title')
        // sortByDes means changing the order
        ->values()
        ->all();
        return view('collections.sortby', [
            'posts' => $posts
        ]);
    }

    public function partition()
    {
       list($popularPosts, $regularPosts) = $this->posts->partition(function($post)
       {
         return $post['data']['ups'] > 1000;
       });

       return view('collections.partition', [
            'popularPosts' => $popularPosts->sortbyDesc('data.ups'),
            'regularPosts' => $regularPosts->sortbyDesc('data.ups')
       ]);
    }

    // reject works same as filter purely remove data based on true or false value
    public function reject()
    {
       $posts = $this->posts->reject(function($post){
         return $post['data']['ups'] < 1000;
       });
       // adn return of view to display these
       return view('collections.reject', [
           'posts' => $posts->sortbyDesc(callback: 'data.ups')
       ]);
    }

    public function wherein()
    {
        $posts = $this->posts->wherein('data.post_hint', ['self', 'image'])
        ->groupBy(groupBy: 'data.post_hint')
        ->toArray(); // return the collection as an array
        // return $posts;
        return view('collections.wherein', [
            'posts' => $posts
        ]);
    }

    // using chunk method collection is broken into smallest array
    public function chunk()
    {
       $posts = $this->posts->chunk(size: 2);

       return view('collections.chunk', [
          'posts' => $posts
       ]);
    }

    public function count()
    {
        $posts = $this->posts->reject(function($post){
            return $post['data']['ups'] < 1000;
          });
          // adn return of view to display these
          return view('collections.count', [
              'posts' => $posts->sortbyDesc(callback: 'data.ups')
          ]);
    }

    public function first()
    {
    //   $firstPopularPost = $this->posts->first(function ($post,$key)
    //   {
    //     return $post['data']['ups'] > 1000;
    //   });
      $firstPopularPost = $this->posts->firstWhere(key: 'data.ups', operator: '>', value: 1000);
      return view('collections.first',[
        'post' => $firstPopularPost
      ]);
    }

    public function tap()
    {
        // Grabbing the whole collection in its current state without effecting the values that is being returned back
        //The tap method passes the collection to the given callback, allowing you to "tap" into the collection at a specific point and do something with the items while not affecting the collection itself. The collection is then returned by the tap method:
        $posts = $this->posts->filter(function($post,$key)
        {
            return $post['data']['post_hint'] = 'image';
        })
        ->sortBy(callback: 'data.title')
        // sortByDes means changing the order
        ->tap(function ($collection)
        {
            \Log::info('IDS form' . $collection->count() . 'posts:',$collection->pluck('data.id')->toArray());
        })
        ->values()
        ->all();
        return view('collections.tap', [
            'posts' => $posts
        ]);
    }
    //The pop method removes and returns the last item from the collection:
    //The prepend method adds an item to the beginning of the collection:
    //The pull method removes and returns an item from the collection by its key:
    //The push method appends an item to the end of the collection:
    //The put method sets the given key and value in the collection:
    //The random method returns a random item from the collection:
    //The range method returns a collection containing integers between the specified range:
    //The reduce method reduces the collection to a single value, passing the result of each iteration into the subsequent iteration:
}