<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; //追加
// use App\Http\Requests\ItemRequest; //追加

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $items = Item::limit(10)->get();
        $data = ['items' => $items];
        return view('home', $data);
    }
}
