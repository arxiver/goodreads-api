<?php

namespace App\Http\Controllers;

use App\Shelf;
use Illuminate\Http\Request;
/**
 * @group Shelf
 * @authenticated
 * APIs for GoodReads
 */
class ShelfController extends Controller
{
    /**
     * List all shelves of the authenticated user .
     * @authenticated
     *
     * @response {
     * "shelf_name" : "to-read",
     * "books_count" : 4
     * }
     */
    public function index()
    {
        //
    }

    /**
     * Create a new book shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the new shelf.
     */
    public function create()
    {
        //
    }

    /**
     * Show a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @return \Illuminate\Http\Response
     */
    public function show(Shelf $shelf)
    {
        //
    }

    /**
     * Add a book to a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @bodyParam book_id int required The id of the book.
     */
    public function addBook(Request $request)
    {
        //
    }


    /**
     * Remove a book from a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @bodyParam book_id int required The id of the book.
     */
    public function removeBook( Request $request)
    {
        //
    }
    /**
     * Get User`s shelves
     * @authenticated
     * @bodyParam user_id int required The name of the shelf.
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     * @response {
	 *"shelves": {
	 *	"user_shelf": [
	 *		{
	 *			"name": "read",
	 *			"book_count": "0"
	 *		},
	 *		{
	 *			"name": "currently-reading",
	 *			"book_count":  "0"
	 *		
	 *		},
	 *		{
	 *			"name": "to-read",
	 *			"book_count": "0"			
	 *		}
	 *	],
	 *	"_start": "1",
	 *	"_end": "3",
	 *	"_total": "3"
	 * } 
     *}
     */
    public function userShelves($user_id)
    {

    }
    /**
     * Destroy a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     */
    public function destroy(Shelf $shelf)
    {
        //
    }
    /**
     * show books on the shelf
     * @bodyParam user_id integer required Get the books on a member's shelf.
     * @bodyParam shelf_name string required specified shelf`s name.
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
	public function getBooksOnShelf($user_id,$shelf_name)
	{
        //
       
    }
}
