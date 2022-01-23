<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pizza;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function show(){
        return view('home');
    }
}
