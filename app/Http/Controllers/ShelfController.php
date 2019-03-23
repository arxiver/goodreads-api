<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
     *
     * @bodyParam shelf_id int required shelf_id { read:0 ,currently_reading:1, to_read:2 } default is read.
     * @bodyParam book_id int required The id of the book.
     *
     * @response 201
     * {
     * "status": "true",
     * "message": "Successfully added ."
     * }
     *
     * @response 400
     * {
     * "status": "false",
     * "message": "Something gone wrong ."
     * }
     *
     * @response 404
     * {
     * }
     */
    public function addBook(Request $request)
    {
        /**
         *
         *  Adding a book to a shelf for the authenticated user
         *  Getting user`s id
         */
        $userId = $this->ID;

        /**
         * Checking request paramaters [ book_id , shelf_id ]
         */
        $bookId = $request->has(['book_id']) ? $request->book_id : abort(404);
        $shelfId = $request->has(['shelf_id']) ? $request->shelf_id : 3 ;

        /**
         *  Executing Query for the given data if it passed with non-aborting
         *  Checking the existance of this book in a shelf before .
         *  Updating the shelf_type in case of it was on another shelf .
         */
        $bookOnShelf = Shelf::where('user_id',$userId)->where('book_id',$bookId);
        if ( sizeof($bookOnShelf->get()) ) {
            $queryResult = DB::update('update shelves set type = ? where user_id = ? and book_id = ? ', [ $shelfId , $userId , $bookId ]);
        }
        else{
            $queryResult = Shelf::updateOrCreate(
                ['user_id' => $userId, 'book_id' => $bookId ],
                ['type' => $shelfId]
            );
        }
        /**
         *  Checking query response
         */
        $response = $queryResult ?
        ["true", "Successfully added ." , 201] : ["false" , "Something gone wrong .", 400 ];

        /**
         *  Responsing
         */
        return response()->json(array("status"=> $response[0],'message'=> $response[1]), $response[2]);
    }


    /**
     * Remove a book from a shelf
     * @authenticated
     * @bodyParam shelf_id int required shelf_id { read:0 ,currently_reading:1, to_read:2 } default is read.
     * @bodyParam book_id int required The id of the book.
     *
     * @response 400
     *  {
     *   "status": "false",
     *   "message": "Something gone wrong ."
     *  }
     * @response 200
     *  {
     *   "status": "true",
     *   "message": "Successfully removed ."
     *  }
     *
     * @response 404
     * {
     *
     * }
     *
     * 0 -> Read
     * 1 -> Currently Read
     * 2 -> Wants to Read
     */

    public function removeBook(Request $request)
    {
        /**
         *
         *  Removing a book from a shelf for the authenticated user
         *  Getting user`s id
         */
        $userId=$this->ID;

        /**
         * Checking request paramaters [ book_id , shelf_id ]
         */
        $bookId = $request->has(['book_id']) ? $request->book_id : abort(404);
        $shelfId = $request->has(['shelf_id']) ? $request->shelf_id : abort(404) ;

        /**
         *  Executing Query for the given data if it passed with non-aborting
         */
        $queryResult = Shelf::where('user_id', $userId)->where('book_id',$bookId)->where('type',$shelfId)->delete();

        /**
         *  Checking query response
         */
        $response = $queryResult ?
        ["true", "Successfully removed ." , 200] : ["false" , "Something gone wrong .", 400 ];

        /**
         *  Responsing
         */
        return response()->json(array("status"=> $response[0],'message'=> $response[1]), $response[2]);
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
