<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Book;

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
        $users = User::orderby('id')->get();     //get all users
        return view('users.index')->with('users', $users);
    }

   //go to an book from the URL=: /book/{id}
    public function show($id)
    {
        if(!ctype_digit($id)){ // string consists of all digs, thus is an int
            abort(404);
        }
        $user = User::findOrFail($id);
        $subscribed_books = [];
          //want to change here: only show list of books that are currently subscribed so not subscribed table
        foreach($user->subscriptions as $subscription) {
            $book = Book::where('id', $subscription->book_id)->get()->first();
            array_push($subscribed_books, $book);
        }
        return view('users.show', compact('user', 'subscribed_books'));
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
      $all_books = [];
      $all_books = Book::orderby('id')->get();;
    	return view('users.edit', compact('user', 'all_books'));

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

         //todo update book subscription status

        return redirect('users');
    }

}
