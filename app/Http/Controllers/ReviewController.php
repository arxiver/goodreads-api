<?php

namespace App\Http\Controllers;
use App\User;
use App\Review;
use App\Shelf;
use App\Book;
use Illuminate\Http\Request;
use DB;
use Validator;
use Response;
/**
 * @group Review
 * @authenticated
 * APIs for GoodReads
 */
class ReviewController extends Controller
{
    /**
     * Create a review
     * @authenticated
     * each state of the shelf is represented by a number
     * @bodyParam bookId int required The book id has reviewed  to be created.
     * @bodyParam shelf int required (read->0,currently-reading->1,to-read->2,nothig of these shelves->3) default is (read) .
     * @bodyParam body optional string optional The text of the review.
     * @bodyParam rating int optional Rating (0-5) default is 0 (No rating).
     *
     * @response 201 {
     *       "status": "true",
     *       "user": 2,
     *       "book_id": "1",
     *       "shelfType": "read",
     *       "bodyOfReview": "Woooooooooooooow , it's a great booooook",
     *       "rate": "1"
     * }
     *
     * @response 204 {
     *  "status": "false" ,
     *  "Message": "There is no Book in the database"
     * }
     *
     * @response 404 {
     *  "status": "false" ,
     *  "Message": "There is no rate to create the review"
     * }
     *
     * @response 406 {
     *   "status": "false",
     *   "errors": "The rating must be an integer."
     * }
     */
    public function createReview(Request $request)
    {
        $Validations    = array(
                "bookId"         => "required|integer",
                "shelf"          => "required|integer|max:3|min:0",
                "rating"         => "integer|max:5|min:1"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if(!empty($request["rating"]))
            {
                if( Book::find($request["bookId"]) )
                {
                    $shelfType = $request["shelf"];
                    DB::table('shelves')
                        ->updateOrInsert(
                            ['user_id' => $this->ID, 'book_id' => $request["bookId"] ,'type' => $shelfType],
                            ['type' => 0]
                        );
                    $Create = array(
                        "user_id" => $this->ID,
                        "book_id" => $request["bookId"],
                        "body"  => $request["body"],
                        "rating" =>$request["rating"]
                    );
                    Review::create($Create);
                    $bookWanted=Book::find($request["bookId"]);
                    $conutOfReviews=$bookWanted["reviewsCount"] +1;
                    $conutOfRating=$bookWanted["ratingsCount"] +1;
                    $avg = DB::table('reviews')->where('book_id', $request["bookId"])->avg('rating');
                    DB::table('books')
                        ->updateOrInsert(
                            ['id' => $request["bookId"]],
                            ['ratingsAvg' => $avg , 'reviewsCount' => $conutOfReviews ,'ratingsCount' => $conutOfRating]
                        );
                    $user=User::find($this->ID);
                    $conutOfRatingUser=$user["ratingCount"] +1;
                    $avgUser = DB::table('reviews')->where('user_id', $this->ID)->avg('rating');
                    DB::table('users')
                        ->updateOrInsert(
                            ['id' =>$this->ID ],
                            ['ratingAvg' => $avgUser ,'ratingCount' => $conutOfRatingUser]
                        );
                    return response()->json([
                        "status" => "true" , "user" => $this->ID, "book_id" =>$request["bookId"] , "shelfType" => "read"
                        ,"bodyOfReview" => $request["body"] , "rate" => $request["rating"]
                    ]);
                }
                else
                {
                    return response()->json([
                        "status" => "false" , "Message" => "There is no Book in the database"
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "There is no rate to create the review"
                ]);
            }
        }
        else{
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
    }

    /**
     * Edit a review
     * @authenticated
     * @bodyParam reviewId int required Review Id.
     * @bodyParam body text optional The text of the review.
     * @bodyParam rating int required Rating (0-5) default is the same as it was .
     *
     * @response {
     *
     * "status": "true",
     * "user": 1,
     * "resourseId": "1",
     * "resourseType": "2",
     * "bodyOfReview": "it 's very good to follow me XD"
     * }
     */
    public function editReview(Request $request)
    {
        $Validations    = array(
            "reviewId"         => "required|integer",
            "rating"         => "required|integer|max:5|min:1"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if( Review::find($request["reviewId"]) ){
                DB::table('reviews')
                        ->updateOrInsert(
                            ['id' => $request["reviewId"]],
                            ['rating' => $request["rating"] , 'body' =>$request["body"]]
                        );
                return response()->json([
                       "status" => "true" , "user" => $this->ID, "review_id" =>$request["reviewId"] ,"bodyOfReview" => $request["body"] , "rate" => $request["rating"]
                ]);
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "The reviewId is wrongggg."
                ]);
            }
        }
        else{
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
    }

    /**
     * Recent reviews from all members.
     * @authenticated
     */
    public function recentReviews()
    {

    }
    /**
     * Remove a Review
     * @authenticated
     * @bodyParam reviewId int required The id of review to be deleted.
     *
     * @response {
     *  "state" : "delete is done"
     * }
     *
     */
    public function destroy($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();
        return response()->json([
            'state' => 'delete is done'
        ]);
    }

    /**
     * Get review statistics given a list of ISBNs
     * take alist of books and then return their reviews And Rates
     * and i will use it to get the review for one book array of one element
     * @authenticated
     * @bodyParam isbns ArrayofInt required  Array of ISBNs(1000 ISBNs per request max.).
     *
     */
    public function getReviewsForListOfBooks()
    {
        //
    }


    /**
     * Get the reviews for a book given a title string
     * @authenticated
     * @bodyParam title string required The title of the book to lookup.
     * @bodyParam author string optional The author name of the book to lookup.
     * @bodyParam rating int optional Show only reviews with a particular rating.
     */
    public function getReviewsByTitle()
    {
        //
    }

    /**
     * List all reviews of the authenticated user
     * @authenticated
     *
     */
    public function listMyReviews()
    {
        $userId =$this->ID;
        User::findOrFail($userId);
        $data = Review::where('user_id', $userId)->get();
        return response()->json(array('my_reviews'=>$data),200);
    }



    /**
     * List the reviews for a specific user
     * @authenticated
     * @bodyParam userId required id of the user
     */
    public function listReviewOfUser()
    {
        //
    }

    /**
     * get a specific review with it's comments and likes
     * @authenticated
     * @bodyParam reviewId required id of the of the review to get it's body when notification happens
     */
    public function showReviewOfBook($id)
    {
        //
        $results = DB::select('select * from reviews where id = ?', [$id]);
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
                200);
        }
    }


    /**
     * Get the review for specific user on a specific Book
     * @authenticated
     * @response {
     * }
     * @bodyParam userId required id of the of the user
     * @bodyParam bookId required id of the of the book
     */
    public function showReviewForBookForUser($user_id , $book_id)
    {
        //
        $results = DB::select('select * from reviews  where userId = ? and bookId = ?', [$user_id,$book_id]);
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
                200);
        }
    }
    /**
     * Get the review for specific user on a specific Book
     * @response {
     * }
     * @authenticated
     * @bodyParam bookId integer required id of the of the book
     */
    public function showReviewsForBook($book_id)
    {
       // $results = DB::select('select * from reviews r, users u where r.userid = u.id and bookId = ?', [$book_id]);
       $results = DB::select('select r.id,r.bookId,r.body,r.rating,r.lastUpdate,r.numberLikes,r.numberComments,r.userId,u.name as username, u.imageLink as userimagelink from reviews r, users u where r.userid = u.id and bookId = ?', [$book_id]);

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
                200);
        }
    }
}
