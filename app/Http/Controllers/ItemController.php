<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    // public function index()
    // {

    // 	return view('item.index');
    // }

    public function create()
    {

    	$data = '<a href="">LinK</a>';

    	return view('item.create',compact('data'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|min:3',
    		'price' => 'required|number',
    		'code' => 'required|max:10'
     	]);

    	Item::create([
    		'name' => $request->name,
    		'price' => $request->price,
    		'code' => $request->code,
    	]);



    }

}

