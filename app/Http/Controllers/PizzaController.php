<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    public function show()
    {
        $categoryName = 'Pizza';
        $category = DB::table('categories')->where('name','=',$categoryName)->get();
        $pizzas = DB::table('products')->where('category_id', '=',$category[0]->id)->get();
        return view('pizzas')->with(compact('pizzas'));
    }
}
