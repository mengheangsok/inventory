<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use DB;
use Auth;

class ItemController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if($user->type == 'admin'){
            if(session('current_location')){
                $items = Item::whereHas('location',function($q) use ($user) {
                
                  return $q->where('location_id',session('current_location'));
        
                })->orderBy('id','desc')->paginate(2);

            }else{
                $items = Item::orderBy('id','desc')->paginate(2);
            }

        }else{
            $items = Item::whereHas('location',function($q) use ($user) {
                if(session('current_location')){
                    $q->where('location_id',session('current_location'));
                }else{
                    $q->whereIn('location_id',$user->location->pluck('id')->toArray());
                }
    
            })->orderBy('id','desc')->paginate(2);
        }

   // 	return response()->json($items);
    	// return redirect();
    	return view('item.index',compact('items'));
    }

    public function new()
    {

    	$categories = Category::all();

    	return view('item.new',compact('categories'));
    }

    public function add(Request $request)
    {
    	$request->validate([
    		'name' => 'required|min:3',
    		'price' => 'required|numeric',
            'code' => 'required|unique:items|max:10',
            'image' => 'mimes:jpeg,png,jpg',
        ],[],
            [
                'name' => 'ឈ្មោះ'
            ]
        );
         
         
        $item = New Item;
        $item->fill($request->all());
        $item->save();

        $message = 'Success Added';
       
        return response()->json(compact('item','message'));
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
            'image' => 'mimes:jpeg,png,jpg',
        ],[],
        [
            'name' => 'ឈ្មោះ'
        ]
    );
         
        $image_name = time().'.'. $request->image->getClientOriginalExtension();
         
        $item = New Item;
        $item->fill($request->all());
        $item->image = $image_name;
        $item->save();

        $request->image->move(public_path('images'),$image_name);

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
        $categories = Category::all();

        return view('item.edit',compact('item','categories'));
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

