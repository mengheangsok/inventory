<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}

