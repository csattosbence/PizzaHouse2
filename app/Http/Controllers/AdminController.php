<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedPizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){

        //dd(Auth::user());
        if( Auth::user() == null) {
            return redirect()->route('home.show');
        }

        if (Auth::user()->role != "Admin") {
            return redirect()->route('home.show');
        }

        return view('admin');
    }
}
