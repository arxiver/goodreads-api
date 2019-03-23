<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use App\Shelf;
use App\Book;
use App\Comment;
use App\Likes;
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
     * @group [Review].Make Review
     *  createReview function
     * 
     *  make a validation on the input to check that is satisfing the conditions 
     * 
     *  if tha input is valid it will continue in the code otherwise it will response with error
     * 
     *  put the book in the shelf_read if it in another shelf or if it wasn't in any shelf 
     * 
     *  create a new review in the databse 
     * 
     *  increment the number of reviews on this book 
     * 
     *  increment the number of ratings on this book
     * 
     *  modify the avgrating for this book 
     * 
     *  increment the number of ratings for the user
     * 
     *  modify the avgrating for the user 
     *  
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
                    $conutOfReviews=$bookWanted["reviews_count"] +1;
                    $conutOfRating=$bookWanted["ratings_count"] +1;
                    $avg = DB::table('reviews')->where('book_id', $request["bookId"])->avg('rating');
                    DB::table('books')
                        ->updateOrInsert(
                            ['id' => $request["bookId"]],
                            ['ratings_avg' => $avg , 'reviews_count' => $conutOfReviews ,'ratings_count' => $conutOfRating]
                        );
                    $user=User::find($this->ID);
                    $conutOfRatingUser=$user["rating_count"] +1;
                    $avgUser = DB::table('reviews')->where('user_id', $this->ID)->avg('rating');
                    DB::table('users')
                        ->updateOrInsert(
                            ['id' =>$this->ID ],
                            ['rating_avg' => $avgUser ,'rating_count' => $conutOfRatingUser]
                        );
                    $reviewId=DB::table('reviews')->max('id');
                    return response()->json([
                        "status" => "true" , "user" => $this->ID, "book_id" =>$request["bookId"] , "shelfType" => "read"
                        ,"bodyOfReview" => $request["body"] , "rate" => $request["rating"] , "Review_id" =>$reviewId
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
                    "status" => "false", "Message" => "There is no rate to create the review"
                ]);
            }
        } else {
            return response(["status" => "false", "errors" => $Data->messages()->first()]);
        }
    }

    /**
     * @group [Review].Edit Review
     * editReview function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * check that the authenticated user is  the one who create the review to allow to him to edit it.
     * 
     * edit the review and rating value.
     * 
     * @authenticated
     * @bodyParam reviewId int required Review Id.
     * @bodyParam body text optional The text of the review.
     * @bodyParam rating int required Rating (0-5) default is the same as it was .
     *
     * @response 201{
     * "status": "true",
     * "user": 1,
     * "bodyOfReview": "it 's very good to follow me XD",
     * "review_id": 2 , 
     * "rate": 4
     * }
     * 
     * @response 204 {
     *  "status": "false" ,
     *  "Message": "The reviewId is wrongggg."
     * }
     * 
     * @response 406 {
     *   "status": "false",
     *   "errors": "The rating must be an integer."
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
                $review = Review::findOrFail($request["reviewId"]);
                $user=User::find($this->ID);
                if ($this->ID == $review['user_id']){
                    DB::table('reviews')
                            ->updateOrInsert(
                                ['id' => $request["reviewId"]],
                                ['rating' => $request["rating"] , 'body' =>$request["body"]]
                            );
                            $avg = DB::table('reviews')->where('book_id', $review["book_id"])->avg('rating');
                            DB::table('books')
                                ->updateOrInsert(
                                    ['id' => $review["book_id"]],
                                    ['ratings_avg' => $avg]
                                );
                    return response()->json([
                        "status" => "true" , "user" => $this->ID, "review_id" =>$request["reviewId"] ,"bodyOfReview" => $request["body"] , "rate" => $request["rating"]
                    ]);
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "This review doesn't belong to you ".$user['name']."."
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => "false", "Message" => "The reviewId is wrongggg."
                ]);
            }
        } else {
            return response(["status" => "false", "errors" => $Data->messages()->first()]);
        }
    }

    /**
     * Recent reviews from all members.
     * @authenticated
     */
    public function recentReviews()
    { }
    /**
     * @group [Review].Delete Review
     * removeReview function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * check that the authenticated user is  the one who create the review to allow to him to delete it.
     * 
     *  delete the review from the databse 
     * 
     *  decrement the number of reviews on this book 
     * 
     *  decrement the number of ratings on this book
     * 
     *  modify the avgrating for this book 
     * 
     *  decrement the number of ratings for the user
     * 
     *  modify the avgrating for the user
     * 
     *  delete the comment and likes on this review and count them 
     *  
     * @authenticated
     * @bodyParam reviewId int required The id of review to be deleted.
     *
     * @response 201{
     *  "status": "true",
     *  "userId": 2,
     *  "ratings_countUser": 4,
     *  "rating_avgUser": "4.0000",
     *  "BookId": 3,
     *  "ratings_avgBook": "4.0000",
     *  "reviews_countBook": 37,
     *  "ratings_countBook": 19,
     *  "NumberOfDeletedCommentsOnThisReview": 3,
     *  "NumberOfDeletedLikesOnThisReview": 1
     * }
     *
     * @response 204 {
     *  "status": "false" ,
     *  "Message": "This review doesn't belong to you Ahmed"
     * }
     * @response 204 {
     *  "status": "false" ,
     *  "Message": "The reviewId is wrongggg."
     * }
     * 
     * @response 406 {
     *   "status": "false",
     *   "errors": "The reviewId must be an integer."
     * }
     */
    public function destroy(Request $request)
    {
        $Validations    = array(
            "reviewId"  => "required|integer",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if( Review::find($request["reviewId"]) ){
                $review = Review::findOrFail($request["reviewId"]);
                $user=User::find($this->ID);
                if ($this->ID == $review['user_id']){
                    $review->delete();
                    $conutOfRatingUser=$user["rating_count"] -1;
                    if ($conutOfRatingUser<0)
                    {
                            $conutOfRatingUser=0;
                    }
                    $avgUser = DB::table('reviews')->where('user_id', $this->ID)->avg('rating');
                    if ($avgUser == NULL)
                    {
                        $avgUser=0.0;
                    }
                    DB::table('users')
                        ->updateOrInsert(
                            ['id' =>$this->ID ],
                            ['rating_avg' => $avgUser ,'rating_count' => $conutOfRatingUser]
                    );
                    //echo $review;
                    //die();
                    $bookWanted=Book::findOrFail($review["book_id"]);
                    $conutOfReviews=$bookWanted["reviews_count"] -1;
                    $conutOfRating=$bookWanted["ratings_count"] -1;
                    if ($conutOfReviews < 0)
                    {
                        $conutOfReviews=0;
                    }
                    if( $conutOfRating < 0 )
                    {
                        $conutOfRating=0;
                    }
                    $avg = DB::table('reviews')->where('book_id', $review["book_id"])->avg('rating');
                    if ($avg == NULL)
                    {
                        $avg=0.0;
                    }
                    DB::table('books')
                        ->updateOrInsert(
                            ['id' => $review["book_id"]],
                            ['ratings_avg' => $avg , 'reviews_count' => $conutOfReviews ,'ratings_count' => $conutOfRating]
                        );
                    $numberOfDeletedComments=DB::table('comments')->where([
                        ['resourse_id',$request["reviewId"] ],
                        ['resourse_type',0],
                    ])->count();
                    DB::table('comments')->where([
                        ['resourse_id',$request["reviewId"] ],
                        ['resourse_type',0],
                    ])->delete();
                    
                    $numberOfDeletedLikes=DB::table('likes')->where([
                        ['resourse_id',$request["reviewId"] ],
                        ['resourse_type',0],
                    ])->count();
                    DB::table('likes')->where([
                        ['resourse_id',$request["reviewId"] ],
                        ['resourse_type',0],
                    ])->delete();
                    return response()->json([
                        "status" => "true" , 'userId'=>$this->ID ,'ratings_countUser'=>$conutOfRatingUser,
                        'rating_avgUser' =>$avgUser,'BookId'=>$review["book_id"],'ratings_avgBook' => $avg , 
                        'reviews_countBook' => $conutOfReviews ,'ratings_countBook' => $conutOfRating,
                        'NumberOfDeletedCommentsOnThisReview' =>$numberOfDeletedComments,
                        'NumberOfDeletedLikesOnThisReview' =>$numberOfDeletedLikes
                    ]);

                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "This review doesn't belong to you ".$user['name']."."
                    ]);
                }
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
    public function getReviewsByTitle($t)
    {
        //
        $rt=DB::select('select * from reviews r , books b where r.book_id = b.id and b.title= ?', [$t]);
        foreach($rt as $res)
            {
                    if($res->shelf_name ==0){
                        $res->shelf_name ='read';
                    }
                    else if($res->shelf_name ==1){
                        $res->shelf_name ='currentlyRead';
                    }
                    else{
                        $res->shelf_name ='WantToRead';

                    }
            }
        if($rt != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $rt),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed',
                'pages' => $rt),
                200);
        }  
    }

    /**
     * List all reviews of the authenticated user
     * @authenticated
     *
     */
    public function listMyReviews()
    {
        $userId = $this->ID;
        User::findOrFail($userId);
        $data = Review::where('user_id', $userId)->get();
        return response()->json(array('my_reviews' => $data), 200);
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
        foreach($results as $res)
            {
                    if($res->shelf_name ==0){
                        $res->shelf_name ='read';
                    }
                    else if($res->shelf_name ==1){
                        $res->shelf_name ='currentlyRead';
                    }
                    else{
                        $res->shelf_name ='WantToRead';

                    }
            }
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
    public function showReviewForBookForUser($user_id, $book_id)
    {
        //
     // $results=DB::table('reviews')->where('user_id',$user_id,'book_id',$book_id)->value('rating','shelf_name','body');  
        $results =DB::select('select rating ,shelf_name , body from reviews  where user_id = ? and book_id = ?', [$user_id,$book_id]);
        if($results != NULL){
          /*  if($results[1]['rating']==0){
                $results[1]='read';
            }
            else if($results[1]==1){
                $results[1]='currentlyRead';
            }
            else{
                $results[1]='WantToRead';
            }*/
            foreach($results as $res)
            {
                    if($res->shelf_name ==0){
                        $res->shelf_name ='read';
                    }
                    else if($res->shelf_name ==1){
                        $res->shelf_name ='currentlyRead';
                    }
                    else{
                        $res->shelf_name ='WantToRead';

                    }
            }
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
       $results = DB::select('select r.id,r.book_id,r.body,r.rating,r.shelf_name,r.likes_count,r.comments_count,r.user_id,u.name as username, u.image_link as userimagelink from reviews r, users u where r.user_id = u.id and book_id = ?', [$book_id]);
       foreach($results as $res)
       {
               if($res->shelf_name ==0){
                   $res->shelf_name ='read';
               }
               else if($res->shelf_name ==1){
                   $res->shelf_name ='currentlyRead';
               }
               else{
                   $res->shelf_name ='WantToRead';

               }
       }
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
