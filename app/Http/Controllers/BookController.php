<?php

namespace App\Http\Controllers;

use App\Book;
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
    public function show ()
    {
        //
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
    public function getBookByTitle()
    {
        //
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
    public function getBookByIsbn()
    {
        //
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
    public function getBookByAuthorName()
    {
        //
    }
}
