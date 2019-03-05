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
     *    *
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
     * "author_name" : "author"
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
     */
    public function show ($book_id)
    {
        //
    }

    /**
     * Show books by genre
     * @bodyParam genreName string required The Genre of list of books.
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     */
    public function showByGenre($genreName)
    {
        //
    }


}
