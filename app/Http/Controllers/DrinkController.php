<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinkController extends Controller
{
    public function show()
    {
        $categoryName = 'Drink';
        $category = DB::table('categories')->where('name','=',$categoryName)->get();
        $products = DB::table('products')->where('category_id', '=',$category[0]->id)->get();
        return view('drinks')->with(compact('products'));

    }
}
