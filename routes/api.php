<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
// Book Section
Route::get('books','BookController@index');
Route::get( 'books/show/{book_id}', 'BookController@show');
Route::get( 'books/genre/{genre_name}', 'BookController@showByGenre');
Route::get('Books/book_title','BookController@getBookByTitle');
Route::get('Books/book_ISBN','BookController@getBookByIsbn');
Route::get('Books/book_Authorname','BookController@getBookByAuthorName');

// Review Section
Route::get('reviwes','ReviewController@index');
Route::post('reviwes/create','ReviewController@create');
Route::get( 'reviwes/show/{id}','ReviewController@show');
Route::put('reviwes/edit', 'ReviewController@edit');
Route::delete('reviwes/{id}', 'ReviewController@destroy');
//Route::get('reviwes/recent', 'ReviewController@recentReviews');
Route::get( 'reviwes/users/{user_id}/books/{book_id}', 'ReviewController@userReview');
Route::get( 'reviwes/books/{bood_id}', 'ReviewController@bookReview');

// Shelf Section
Route::get('shlef/list', 'ShelfController@index');
Route::post('shelf/create', 'ShelfController@create');
Route::get('shelf/{shelf_name}', 'ShelfController@show');
Route::post('shelf/add_book', 'ShelfController@addBook');
Route::get('shelf/{user_id}','ShelfController@userShelves');
Route::delete('shelf/{shelf_name}/remove_book/{book_id}', 'ShelfController@removeBook');
Route::get('shelf/{get_books}','ShelfController@getBooksOnShelf');

//User section
Route::get('UserController','BookController@index');
Route::get('UserController/{user}','UserController@getUser');
