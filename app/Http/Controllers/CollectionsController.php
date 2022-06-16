<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeckt;


class CollectionsController extends Controller
{
    public function filters()
    {
       $collection = Objeckt::all();
       $data = $collection->filter(function($item,$key)
       {
        if($item['city'] != ''){
            return true;
        };
       });
       var_dump($data);
    }


    public function averages()
    {
       $data = [
        ['price' => 10000, 'tax' => 500, 'active' => true],
        ['price' => 20000, 'tax' => 500, 'active' => false],
        ['price' => 30000, 'tax' => 500, 'active' => true],
       ];
       return collect($data)->average(function($value)
       {
      return $value['price'] + $value['tax'];
        if(!$value == 'active'){
            return null;
        }
          return $value['price'] + $value['tax'];
       });
       dd($value);
    }

    public function max()
    {
       $data = objeckt::all();
       $collection = collect($data)->max();
       dd($collection);
    }

    function median()
    {
      $data = Objeckt::all();
      $collection = collect($data)->filter(function($data,$key)
      {
        if($data['postal_code'] != ''){
            return true;
        }
      })
      ->max();
      dd($collection);
    }

    function min()
    {
      $data = Objeckt::all();
      $collection = collect($data)->filter(function($data,$key)
      {
        if($data['postal_code'] != ''){
            return true;
        }
      })
      ->min();
      dd($collection);
    }

    function collapse()
    {
     $data = [
              [1,2,3,4],
              [5,6,7,8],
            ];
    return collect($data)->collapse();
     var_dump($data);
    }

    function combine()
    {
       $data = collect(['column1','column2']);
       return $data->combine(['value1','value2']);

    }

    function concat()
    {
      $data = collect(['value']);
      return $data->concat(['value1']);
    }

    // Contains check whether the collect value is pass or not means the data we pass is available or not
    // Contain strict method check strict for example if we pass space before variable it also check spaces and starting variables and strings or int value.

    function contain()
    {
    // $collection = collect([15])->contains(function($value,$key)
    // {
    //     if($value > 10)
    //     return true;
    // });
    // dd($collection);
     $data = objeckt::all();
     $collection = collect($data)->filter(function($data,$key)
     {
       if($data['order'] > 4000){
         return true;
       }
        return \Str::contains($data['category']['website'], 'www.vitis.at');
     });
       var_dump($collection);

    }

    function containstrict()
    {
       $data = collect([' 0015'])->containsStrict(['0015']);
       dd($data);
    }

    // sub se phele collection me array data ko collect kiya jata map basically is data ko modify kerta yani ke is me kuch operation performed kerta he callback function ke through
    function map()
    {
      $data = collect([1,2,3,4,5]);
      $x = $data->map(fn($value) => $value * 2);
      print($x);
    }

    // Diff is used to differentiate whether the given array value is diff

    function diff()
    {
      // $data = collect([1 => 'apple',2 => 'orange']);
      // $val = $data->diffKeys([4 => 'banana', 1 => 'mango']);
      // print($val);

      $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
        return strtoupper($name);
    })->reject(function ($name) {
        return empty($name);
    });
    print($collection);
    }






}
