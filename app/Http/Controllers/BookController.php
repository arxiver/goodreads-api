<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Response;
use Validator;

use Illuminate\Http\Request;

/**
 * @group Book
 *
 *
 *
 * */

class BookController extends Controller
{

    /**
     *
     * List all books
     *
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     *
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     *
     */
    public function index()
    {
        //
    }
    /**
     * Show book
     * @bodyParam book_id int required The id of the book.
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     *

     */
    public function show (Request $request)
    {
        //
        
        //$results = DB::select('select * from books where id = ?', [$request["book_id"]])->first();
        $results = Book::find([$request["book_id"]])->first();
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this id',
                'pages' => $results),
                200);
        }

    }

    /**
     *  @group [Review].get Book By genre
     *   Show books by genre
     * 
     * function is responsible for showing books by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * genre type.
     * @bodyParam genreName string required The Genre of list of books.
     *
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     */
    public function showByGenre(Request $request)
    {
        //
        $Validations    = array(
            "genreName"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from books where and type = ?', [$request['genreName']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this title',
                'pages' => $results),
                200);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this title',
            ),
            200);
    }
    }
    /**
     * @group [Review].get Book By title
     *  get the needed book by its name
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * title.
     * @bodyParam title string required Find books by title
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     */
    public function getBookByTitle(Request $request)
    {
        $Validations    = array(
            "title"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from books where title = ?', [$request['title']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this title',
                'pages' => $results),
                200);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this title',
            ),
            200);
    }
    }
    /**
     * @group [Review].get Book By Isbn
     *    get the needed book by its ISBN
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * isbn.
     * @bodyParam ISBN int required Find books by ISBN
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     */
    public function getBookByIsbn(Request $request)
    {
        //
        $Validations    = array(
            "ISBN"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from books where isbn = ?', [$request['ISBN']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this isbn',
                'pages' => $results),
                200);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this isbn',
            ),
            200);
    }
    }
    /**
     * @group [Review].get Book By Author Name
     *    search about the needed book by its Author name
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language
     * ,description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * author name
     * @bodyParam Author_name string required Find books by Author's name.
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     */
    public function getBookByAuthorName(Request $request)
    {
        //
        $Validations    = array(
            "Author_name"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from books b , authors a where a.id = b.author_id and a.author_name=?', [$request['Author_name']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books have this author name',
                'pages' => $results),
                200);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books have this author name',
            ),
            200);
    }
    }
}
