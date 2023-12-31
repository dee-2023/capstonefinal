<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return view('admin.index');
        } else if(Auth::user()->role == 'user'){
            return view('home');
        
        }
    }

    public function shop()
    {
        $products = Product::all();
        return view('index', compact('products')); // Update the view name to 'index'
    }
}
