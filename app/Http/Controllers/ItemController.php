<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use DB;

class ItemController extends Controller
{
    public function index()
    {
        // $items = DB::table('items')->orderBy('id','desc')->paginate(2);

        $items = Item::orderBy('id','desc')->paginate(2);

    	return view('item.index',compact('items'));
    }

    public function create()
    {

    	$categories = Category::all();

    	return view('item.create',compact('categories'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|min:3',
    		'price' => 'required|numeric',
    		'code' => 'required|unique:items|max:10',
            'category_id' => 'required',
     	]);

        $item = New Item;
        $item->fill($request->all());
        $item->save();


    	// Item::create([
    	// 	'name' => $request->name,
    	// 	'price' => $request->price,
    	// 	'code' => $request->code,
    	// ]);

        // DB::table('items')->insert([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'code' => $request->code,
        // ]);

        return redirect('/item/create')->withSuccess('Item Created Successfully');

    }

    public function edit($id)
    {
        $item = Item::where('id',$id)->first();

        return view('item.edit',compact('item'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'code' => 'required|unique:items,code,'.$id.'|max:10'
        ]);

        $item = Item::where('id',$id)->first();

        $item->fill($request->all());
        $item->description = 'This is no more information.';
        $item->save();

        // $item->name = $request->name;
        // $item->code = $request->code;
        // $item->price = $request->price;

        // $item->save();

        return redirect('/item')->withSuccess('Item Updated Successfully');

    }

    public function delete($id)
    {
        $item = Item::where('id',$id)->first();
        $item->delete();

        // Item::truncate();

        return redirect('/item')->withSuccess('Item Deleted Successfully');
    }

}

