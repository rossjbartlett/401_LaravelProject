<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
      $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();     //get all users
        return view('users.index')->with('users', $users);
    }

   //go to an book from the URL=: /book/{id}
    public function show($id)
    {
        if(!ctype_digit($id)){ // string consists of all digs, thus is an int
            abort(404);
        }
        $user = User::findOrFail($id);
        // the 'findOrFail' basically does this: if(is_null($book)) abort(404);
        return view('users.show', compact('user')); // compact() replaces with()
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$user = User::findOrFail($id);
    	return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage
     */
    public function update(UserRequest $request, $id)
    {
    	 $user = User::findOrFail($id);
    	 $user->update([
            'role' => $request->input('role'),
            'birthday' => $request->input('birthday'),
            'education_field' => $request->input('education_field'),

            'updated_at' => \Carbon\Carbon::now(),
        ]);


        return redirect('users');
    }

}
