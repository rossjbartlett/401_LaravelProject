<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
// use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Auth::user()->books; // gets all books from this user
        $books = Book::all();     //get all books
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Http\Requests\BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //and puts the user's ID in it ?

        //new book row
        $book  = new Book();
        $book->name = $request->input('name');
        $book->ISBN = $request->input('ISBN');
        $book->publication_year = $request->input('publication_year');
        $book->publisher = $request->input('publisher');
        $book->image = $request->input('image');
        $book->save();

        //new author row(s)
        $author = new Author();
        $authNames = $request->input('author'); // can be one or many, comma seperated
        $bookTemp = Book::where('ISBN', $request->input('ISBN'))->first();
        
    
        $auths = explode("," , $authNames); //handles multiple auths, or just 1 auth
        foreach($auths as $name) {
            //if author isn't already in table
            if (Author::where('name', '=', $name)->exists() != 1) {
                $author = new Author();
                $author->name = $name;
                $author->save();
                $bookTemp->authors()->attach($author->id);
            }
            else { //attach for many to many with exisitng
                    $authTemp = Author::where('name', $name)->first();
                    $bookTemp->authors()->attach($authTemp->id);
            }
        }
         
       // $bookTemp->authors()->attach($author->id);

        // Auth::user()->books()->save($book);

        // TODO: we do want to check the level of Authentication, but we dont want to put the users ID on it 

        // Book::create($request->all()); //adds row to DB //gets everything on POST (from the books/create page)
        return redirect('books');
    }


    //go to an book from the URL=: /book/{id}
    public function show($id)
    {
        if(!ctype_digit($id)){ // string consists of all digs, thus is an int
            abort(404);
        }
        $book = Book::findOrFail($id);
        // the 'findOrFail' basically does this: if(is_null($book)) abort(404);
        return view('books.show', compact('book')); // compact() replaces with()
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book')); // compact() replaces with()
    }

    /**
     * Update the specified resource in storage
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book =Book::findOrFail($id);
        if($book->authors->count() == 1) { //if author only had one book, delete author too
            $book->authors()->delete();
        }
        $book->delete();
        return redirect('books')->with('message', 'Book Deleted.');;
    }
}
