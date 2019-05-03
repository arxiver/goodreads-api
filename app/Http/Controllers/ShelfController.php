<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Shelf;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Review;
use Route;
use App\User;
use App\Book;
use App\Comment;
use App\Likes;

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
        $reviewUpdate = DB::update( 'update reviews set shelf_name = ? where user_id = ? and book_id= ?', [$shelfId,$this->ID,$bookId]);

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


        $reviewQuery=DB::select('select id from reviews where user_id = ? and book_id = ?', [$this->ID,$bookId]);
        if(sizeof($reviewQuery)>0)
        $reviewId= $reviewQuery[0]->id;
        else
        $reviewId=-1;
        if ($reviewId != -1 ) {
            $review = Review::findOrFail($reviewId);
            $user = User::find($this->ID);
            if ($this->ID == $review['user_id']) {
                $review->delete();
                $conutOfRatingUser = $user["rating_count"] - 1;
                if ($conutOfRatingUser < 0) {
                    $conutOfRatingUser = 0;
                }
                $avgUser = DB::table('reviews')->where('user_id', $this->ID)->avg('rating');
                if ($avgUser == null) {
                    $avgUser = 0.0;
                }
                DB::table('users')
                    ->updateOrInsert(
                        ['id' => $this->ID],
                        ['rating_avg' => $avgUser, 'rating_count' => $conutOfRatingUser]
                    );
                $bookWanted = Book::findOrFail($review["book_id"]);
                $conutOfReviews = $bookWanted["reviews_count"] - 1;
                $conutOfRating = $bookWanted["ratings_count"] - 1;
                if ($conutOfReviews < 0) {
                    $conutOfReviews = 0;
                }
                if ($conutOfRating < 0) {
                    $conutOfRating = 0;
                }
                $avg = DB::table('reviews')->where('book_id', $review["book_id"])->avg('rating');
                if ($avg == null) {
                    $avg = 0.0;
                }
                DB::table('books')
                    ->updateOrInsert(
                        ['id' => $review["book_id"]],
                        ['ratings_avg' => $avg, 'reviews_count' => $conutOfReviews, 'ratings_count' => $conutOfRating]
                    );

                DB::table('comments')->where([
                    ['resourse_id', $request["reviewId"]],
                    ['resourse_type', 0],
                ])->delete();

                DB::table('likes')->where([
                    ['resourse_id', $request["reviewId"]],
                    ['resourse_type', 0],
                ])->delete();
            }
        }

        $queryResult = Shelf::where('user_id', $userId)->where('book_id', $bookId)->where('type', $shelfId)->delete();

        /**
         *  Checking query response
         */
        $response = $queryResult ?
            ["true", "Successfully removed .", 200] : ["false", "Something gone wrong .", 400];

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
     * @bodyParam user_id integer optional Get the books on a member's shelf.
     * @bodyParam shelf_name integer required specified shelf`s name.
     * @response {
     * "status": "success",
     *"pages": [
     * {
     *     "book_id": 95,
     *     "title": "9jT4WR",
     *      "id": 3,
      *      "isbn": "9780316449274",
      *      "img_url": "https://images-na.ssl-images-amazon.com/images/I/51Jb2iLFuXL._SX329_BO1,204,203,200_.jpg",
      *      "reviews_count": 0,
      *      "ratings_count": 0,
      *      "author_id": 3,
      *      "author_name": "Meagan Spooner",
      *      "ratings_avg": 0,
      *      "created_at": "2019-05-03 00:15:55"
     *  }
     *]
     *}
     */
	public function getBooksOnShelf(Request $request)
	{
        $Validations    = array(
            "shelf_name"      => "required|integer",
            "user_id"         => "nullable|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            $results;
            if($request['user_id']!=NULL){
                $results=DB::select('select s.book_id , b.title ,b.id , b.isbn , b.img_url , b.reviews_count , b.ratings_count , b.author_id , a.author_name , b.ratings_avg , s.created_at from shelves s , authors a , books b where b.id = s.book_id and a.id = b.author_id and s.type=? and s.user_id=? ORDER BY s.created_at DESC',[$request['shelf_name'],$request['user_id']]);
            }
            else{
                $results=DB::select('select s.book_id , b.title , b.id , b.isbn , b.img_url , b.reviews_count , b.ratings_count , b.author_id , a.author_name , b.ratings_avg , s.created_at from shelves s , books b , authors a where b.id = s.book_id and a.id = b.author_id and s.type=? and s.user_id=? ORDER BY s.created_at DESC',[$request['shelf_name'],$this->ID]);
            }
            if($results != NULL){
                return Response::json(array(
                    'status' => 'success',
                    'pages' => $results),
                    200);
            }
            else{
                return Response::json(array(
                    'status' => 'failed, no returned results for the input',
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
        /**
    * @group [Shelf].Show Shelf
    * showShelf
    * give the functio the id of the book and return the shelf number for you 
    *
    * or told you that you don't have this book in nay shelf 
    * @authenticated 
    *
    * @bodyParam bookId int required id of the book to get it's shelf
    * @response 200
    * {
    *   "ShelfName": 0,
    *   "status": "true"
    * }
    * @response 200
    * {
    *    "status": "true",
    *    "Message": "The book not in a shelf for you"
    * }
    * @response 404
    * {
    *    "status": "false",
    *    "Message": "There is no book with this id"
    * }
    * @response 404
    * {
    *    "status": "false",
    *    "errors": "The id field is required."
    * }
    */
    public function showShelf(Request $request)
    {
        $Validations    = array(
            "bookId"        => "required|integer",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Book::find($request["bookId"]) )
            {

                $results=Db::select('SELECT s.type FROM shelves AS s WHERE s.user_id=? AND s.book_id=?',[$this->ID,$request['bookId']]);
                if($results != NULL){
                    return response()->json(["ShelfName"=>$results[0]->type,"status" => "true"]);
                }
                else{
                    return response()->json([
                        "status" => "true" , "Message" => "The book not in a shelf for you "
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "There is no book with this id"
                ]);
            }
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
    }
}
