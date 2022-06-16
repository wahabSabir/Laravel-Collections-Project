<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TestController extends Controller
{
    function filter()
    {
        $collection = collect([1, 2, 3, 4]);
        $filtered = $collection->filter(function ($value, $key) {
            return $value > 2;
        });
        $filtered->all();
        dd($filtered);
    }

}
