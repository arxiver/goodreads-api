<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Response;
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
    public function show ($id)
    {
        //
        $results = DB::select('select * from books where id = ?', [$id]);
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
     * Show books by genre
     * @bodyParam genreName string required The Genre of list of books.
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
     */
    public function showByGenre()
    {
        //
        $results = DB::select('select * from books where title = ?', [$book_title]);
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
    /**
     * get the needed book by its name
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
    public function getBookByTitle($book_title)
    {
        //
        $results = DB::select('select * from books where title = ?', [$book_title]);
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
    /**
     * get the needed book by its ISBN
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
    public function getBookByIsbn($isbn)
    {
        //
        $results = DB::select('select * from books where isbn = ?', [$isbn]);
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
    /**
     * search about the needed book by its Author name
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
    public function getBookByAuthorName($author_name)
    {
        //
        $results = DB::select('select * from books b , authors a where a.id = b.author_id and a.author_name=?', [$author_name]);
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
}
