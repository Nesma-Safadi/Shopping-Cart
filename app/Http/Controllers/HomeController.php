<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function index()
    {
        return view('home');
    }

    public function store()
    {
        if ( session('success'))
        {
            toast(session('success'), 'success');
        }

        $latestProducts = Product::latest()->take(3)->get();
        return view('store',compact('latestProducts'));
    }

}
