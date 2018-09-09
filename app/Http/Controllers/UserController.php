<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Mail;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);

        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $locations = Location::all();

        return view('user.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $user = new User();

        $user->fill($request->all());

        $user->password = bcrypt($request->password);

        $user->save();


        $user->location()->attach($request->location_id ? : []);

        Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
            // $m->from('learninglaraveltest@gmail.com', 'Inventory');

            $m->to($user->email)->subject('Register User');
        });


        return redirect()->back()->withSuccess('Successfull Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        $location_users = $user->location->pluck('id')->toArray();

        $locations = Location::all();

        return view('user.edit',compact('user','locations','location_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->fill($request->all());

        $user->save();


        $user->location()->sync($request->location_id ? : []);


        return redirect()->back()->withSuccess('Successfull Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->withSuccess('Successfull Deleted');

    }
}
