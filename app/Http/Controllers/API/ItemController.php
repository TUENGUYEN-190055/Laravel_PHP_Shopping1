<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function get(){
        $items = Item::limit(10)->get();
        return response()->json($items);
    }

    // public function fetch(Request $request){
    //     $items = Item::find()
    // }
}
