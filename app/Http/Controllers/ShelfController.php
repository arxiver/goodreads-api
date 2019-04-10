<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Shelf;
use Illuminate\Http\Request;
use Validator;
use Response;
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
     * @group [Shelf].Add Book
     * addBook function . 
     * 
     * Add a book to a shelf
     * 
     * 
     * given request paramters (book_id , shelf_id=0)
     * 
     * checking the existance of the given book on the shelf if it already exists it`s being update
     * 
     * if it`s new entry creating new record and responses successfully add 
     * 
     * in-case of the book is already exists and the user trying to add it onto the same shelf
     * 
     * it returnd an error message ( Something gone wrong).
     * 
     * 
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
     * @authenticated
     * 
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
        $shelfId = $request->has(['shelf_id']) ? $request->shelf_id : 0 ;

        /**
         *  Executing Query for the given data if it passed with non-aborting
         *  Checking the existance of this book in a shelf before .
         *  Updating the shelf_type in case of it was on another shelf .
         */
        $bookOnShelf = Shelf::where('user_id',$userId)->where('book_id',$bookId);
        if ( sizeof($bookOnShelf->get()) ) {
            
            $queryResult = 
            DB::update('update shelves set type = ? where user_id = ? and book_id = ? ',
                [ $shelfId , $userId , $bookId ]);
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
     * 
     * @group [Shelf].Remove Book
     * removeBook function
     * 
     * Remove a book from a shelf
     * 
     * it is required (book_id,shelf_id) in the request
     * 
     * Validate the existance of these paramaters in the request
     * 
     * Then searching for them in the DB . deleting them if exists
     * 
     * returns successfully removed when it is deleted 
     * 
     * otherwise it respones with error message .
     * 
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
     * @authenticated
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
     * @group [Shelf].getBooksOnShelf
     * show books on the shelf
     * this function is responsible for showing books on the user's shelf by
     * returning the (book id,title).
     * all of that formed by sending the parameters which :-
     * shelf name
     * user id
     * @bodyParam user_id integer required Get the books on a member's shelf.
     * @bodyParam shelf_name string required specified shelf`s name.
     * @response {
     * "status": "success",
     *"pages": [
     * {
     *     "book_id": 95,
     *     "title": "9jT4WR"
     * },
     * {
     *     "book_id": 17,
     *     "title": "pNUWhb"
     * },
     * {
     *     "book_id": 50,
     *     "title": "ZPiAVs"
     * },
     * {
     *     "book_id": 9,
     *     "title": "3SrTCb"
     * },
     * {
     *     "book_id": 35,
     *     "title": "TVSXeR"
     * },
     * {
     *     "book_id": 61,
     *      "title": "gBpaYn"
     * }
     *]
     *}
     */
	public function getBooksOnShelf(Request $request)
	{
        //
        $Validations    = array(
            "shelf_name"         => "required|string",
            "user_id"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if($request['shelf_name']=='read'){
                $request['shelf_name']=0;
            }
            else if($request['shelf_name']=='wanttoread'){
                $request['shelf_name']=2;
            }
            else{
                $request['shelf_name']=1;
            }
       $results=Db::select('select s.book_id , b.title from shelves s , books b where b.id = s.book_id and s.type=? and s.user_id=?',[$request['shelf_name'],$request['user_id']]);
       if($results != NULL){
        return Response::json(array(
            'status' => 'success',
            'pages' => $results),
            200);
    }
    else{
        return Response::json(array(
            'status' => 'failed',
            'pages' => $results),
            400);
    }
}
else{
    return Response::json(array(
        'status' => 'failed',
        ),
        400);
}
    }
}
