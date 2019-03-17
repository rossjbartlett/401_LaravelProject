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
	if ($count_a == 0 && $count_b == 0) {
		if (($handle = fopen ( public_path () . '/Lab4Books.csv', 'r' )) !== FALSE) {
			while ( ($data = fgetcsv ( $handle, ',' )) !== FALSE ) {
				$b_data = new Book ();
				$a_data = new Author();
				$b_data->ISBN = $data [0];
				$b_data->name = $data [1];
				$b_data->publication_year = $data [3];
				$b_data->publisher = $data [4];
				$b_data->image = $data [5];
				$b_data->save ();
				$a_data->name = $data[2];
				$a_data->save ();
			}
			fclose ( $handle );
		}
	}
	
    return view('welcome');
});

Route::get('/books', function () {
    return view('books');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('books', 'BookController');

