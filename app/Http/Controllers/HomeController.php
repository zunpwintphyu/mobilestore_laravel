<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\Brand;
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
        $brands = Brand::all();
        $lists = Lists::all();


        // dd($brands->count());
        // dd($lists->count());
        return view('home',compact('brands','lists'));
    }
}
