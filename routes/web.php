<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Author;
use App\Book;

//populate books table and authors table with csv information
Route::get('/', function () {
	$count_a = Author::count();
	$count_b = Book::count();

	if ($count_a == 0 && $count_b == 0) { //only upload the CSV if the Author and Book tables are currently empty
		if (($handle = fopen ( public_path () . '/Lab4Books.csv', 'r' )) !== FALSE) {
			while ( ($data = fgetcsv ( $handle, ',' )) !== FALSE ) {
				$b_data = new Book ();
				$a_data = new Author();
				$b_data->ISBN = trim($data [0]);
				$b_data->name = trim($data [1]);
				$b_data->publication_year = trim($data [3]);
				$b_data->publisher = trim($data [4]);
				$b_data->image = trim($data [5]);
				$b_data->save ();
				$a_data->name = trim($data[2]);
				$a_data->save ();
				//should be fine since csv does not contain multiple authors
				$book = Book::where('ISBN', $data[0])->first();
				$book->authors()->attach($a_data->id);

			}
			fclose ( $handle );
		}
	}

    return view('welcome');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/authors', function() {
	return view('authors');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('books', 'BookController');
Route::resource('authors', 'AuthorController');
Route::resource('subcriptions', 'SubcriptionController');
