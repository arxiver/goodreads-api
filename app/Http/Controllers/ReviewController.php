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
use Illuminate\Support\Arr;
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
                            ['type' => 0,'updated_at'=>now()]
                        );
                    if (!empty($request["body"]))
                    {
                        DB::table('reviews')
                        ->updateOrInsert(
                            ['user_id' => $this->ID, 'book_id' => $request["bookId"]],
                            ["body"  => $request["body"],
                            "shelf_name" => 0,
                            "rating" =>$request["rating"],
                            'updated_at'=>now()]
                        );
                    }
                    else{
                        DB::table('reviews')
                        ->updateOrInsert(
                            ['user_id' => $this->ID, 'book_id' => $request["bookId"]],
                            [
                            "shelf_name" => 0,
                            "rating" =>$request["rating"],'updated_at'=>now()]
                        );
                    }
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
                    //$reviewId=DB::table('reviews')->max('id');
                    $actualbody = DB::table('reviews')->where([['book_id', $request["bookId"]],
                            ['user_id' , $this->ID]])->first();
                            //die($actualbody->body) ;                  
                    if (!empty($actualbody->body))
                    {
                        return response()->json([
                            "status" => "true" , "user" => $this->ID, "book_id" =>$request["bookId"] , "shelfType" => "read"
                            ,"bodyOfReview" =>$actualbody->body , "rate" => $request["rating"] , "Review_id" =>$actualbody->id
                        ]);
                    }
                    else{
                        return response()->json([
                            "status" => "true" , "user" => $this->ID, "book_id" =>$request["bookId"] , "shelfType" => "read"
                            ,"bodyOfReview" =>"No Body"  , "rate" => $request["rating"] , "Review_id" =>$actualbody->id
                        ]);
                    }
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
     * @group [Review].getReviewsByTitle
     * 
     * Get the reviews for a book given a title string.
     * this function is responsible for showing certain review by
     * returning the (body,rating,comments counts, likes counts, user id ,book id , updates date)
     * of a certain review and also it returns the shelf name of the book the review about
     * all of that formed by sending the parameters which 
     * title -> required.
     * rating ->optional.
     * author ->optional.
     * @response{
     * "status": "success",
    *"pages": [
        *{
            *"id": 6,
            *"user_id": 3,
            *"book_id": 21,
            *"body": "Woooooooooooooow  it is a great booooook",
            *"shelf_name": "read",
            *"rating": 2,
            *"likes_count": null,
            *"comments_count": 5,
            *"created_at": null,
            *"updated_at": null,
            *"title": "A1Qqt5",
            *"isbn": 874903,
            *"img_url": "1QnTh",
            *"publication_date": "1984-01-23",
            *"publisher": "p8KKlg0Kz0",
            *"language": "3icja",
            *"description": "7fiL90Uxk3POcHkY0gJD",
            *"reviews_count": 1,
           * "ratings_count": 1,
          *  "ratings_avg": 2,
         *   "link": "http://www.rowe.biz/odio-iure-eos-omnis-amet",
        *    "author_id": 6,
       *     "pages_no": 0,
      *      "author_name": "ahmed"
     *   }
    *]
     * }
     * @authenticated
     * @bodyParam title string required The title of the book to lookup.
     * @bodyParam author string optional The author name of the book to lookup.
     * @bodyParam rating int optional Show only reviews with a particular rating.
     */
    public function getReviewsByTitle(Request $request)
    {
        //
        $Validations    = array(
            "title"         => "required|string",
            "author"         =>"nullable|string",
            "rating"         =>"nullable|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if($request['author']!=NULL){
                if($request['rating']!=NULL){
                    $rt=DB::select('select * from reviews r , books b , authors a where r.book_id = b.id and a.id=b.author_id and b.title= ? and a.author_name=? and r.rating=?', [$request['title'],$request['author'],$request['rating']]);
                }else{
                $rt=DB::select('select * from reviews r , books b , authors a where r.book_id = b.id and a.id=b.author_id and b.title= ? and a.author_name=?', [$request['title'],$request['author']]);
                }
            }
            else{
                 $rt=DB::select('select * from reviews r , books b where r.book_id = b.id and b.title= ?', [$request['title']]);
            }
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
                'status' => 'failed'),
                400);
        }
    }  
    else{
        return Response::json(array(
            'status' => 'failed'),
            400);
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
     * @group [Review].show Review For Book
     * get a specific review 
     * 
     * this function is responsible for showing details of a certain review by
     * returning the (body,rating,comments counts, likes counts, user id ,book id )
     * of a certain review and also it returns the shelf name of the book the review about
     * all of that formed by sending the parameters which :-
     * review id.
     * @response {
    *"status": "success",
    *"pages": [
    *{
    * "id": 2,    
    *"user_id": 3,
    *"book_id": 21,
    *"body": "Woooooooooooooow  it is a great booooook",
    *"shelf_name": "read",
    *"rating": 2,
    *"likes_count": null,
    *"comments_count": 5,
    *"created_at": "2019-03-23 15:41:01",
    *"updated_at": "2019-03-23 15:41:01"
    *   }
    *],
    *"user": [
    *{
    *     "user_name": "Esmeralda Ruecker",
    *      "image_link": "https://lorempixel.com/640/480/?10685"
    *   }
    *],
    *"book": [
    *{
    *     "book_name": "A1Qqt5",
    *      "book_image": "1QnTh"
    *   }
    *],
    *"auther": [
    *    {
    *         "author_name": "ahmed"
    *      }
    *   ]
    *}
     * @bodyParam reviewId required id of the of the review to get it's body when notification happens
     */
    public function showReviewOfBook(Request $request)
    {
        //
        $Validations    = array(
            "reviewId"         => "required|integer",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from reviews where id = ?', [$request['reviewId']]);
        $user;
        $book;
        $author;
        foreach($results as $res)
            {
                if($res->user_id>=0){
                    $user=DB::select('select name as user_name,image_link as image_link from users where id=?', [$res->user_id]);
                }
                if($res->book_id>=0){
                    $book=DB::select('select title as book_name,img_url as book_image from books where id=?',[$res->book_id]);
                    $author=DB::select('select a.author_name as author_name from authors a , books b where a.id=b.author_id and b.id=?',[$res->book_id]);
                }
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
                'pages' => $results,
                'user' => $user,
                'book' =>$book,
                'auther'=>$author),
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


    /**
     * @group [Review].show Review For Book For User
     * 
     * 
     * Get the review for specific user on a specific Book 
     * this function is responsible for showing review of a certain user on a certain book by
     * returning the (body,rating) of a certain review and also it returns the shelf name of
     * the book the review about
     * all of that formed by sending the parameters which :-
     * book id and
     * user id
     * @response {
     * "status": "success",
     * "pages": [
     *      {
    *       "rating": 2,
    *       "shelf_name": "read",
    *       "body": "Woooooooooooooow  it is a great booooook"
    *       }
     *    ]
     * }
     * @bodyParam userId required id of the of the user
     * @bodyParam bookId required id of the of the book
     */
    public function showReviewForBookForUser(Request $request)
    {
        //
        $Validations    = array(
            "userId"         => "required|integer",
            "bookId"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results =DB::select('select rating ,shelf_name , body from reviews where user_id = ? and book_id = ?', [$request['userId'],$request['bookId']]);
        if($results != NULL){
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
                'status' => 'failed')
                ,
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
     * @group [Review].show Reviews For Book
     * 
     * Get the review for specific user on a specific Book
     * this function is responsible for showing review of a certain book by returning the (idmbody,rating,likes count,
     * comments count,user id)
     * of a certain review and also it returns the shelf name of the book the review about
     * and also the username as well, all of that formed by sending the parameters which :-
     * book id 
     * @response {
      * "status": "success",
      *"pages": [
      *  {
      *      "id": 8,
      *      "book_id": 61,
      *      "body": "ktok",
      *      "rating": 5,
      *      "shelf_name": "currentlyRead",
      *      "likes_count": 9,
      *       "comments_count": 7,
      *     "user_id": 2,
      *      "created_at": "2019-04-17 00:00:00",
      *      "updated_at": "2019-04-25 00:00:00",
      *      "username": "Merl Beer V",
      *      "userimagelink": "https://lorempixel.com/640/480/?94923"
      *  },
      *  {
      *      "id": 1000010,
      *      "book_id": 61,
      *      "body": "Woooooooooooooow  it is a great booooook",
      *      "rating": 2,
      *      "shelf_name": "read",
      *      "likes_count": null,
      *      "comments_count": null,
      *      "user_id": 1,
      *      "created_at": "2019-04-05 23:32:56",
      *      "updated_at": "2019-04-05 23:32:56",
      *      "username": "Shakira Hahn",
      *      "userimagelink": "https://lorempixel.com/640/480/?74240"
      *  },
      *  {
      *      "id": 5,
      *      "book_id": 61,
      *      "body": "gghg",
      *      "rating": 5,
      *      "shelf_name": "read",
      *      "likes_count": 4,
      *      "comments_count": 9,
      *      "user_id": 3,
      *      "created_at": "2019-04-03 00:00:00",
      *      "updated_at": "2019-04-10 00:00:00",
      *      "username": "Esmeralda Ruecker",
      *      "userimagelink": "https://lorempixel.com/640/480/?10685"
     *   }
    *]
    * }
     * @bodyParam bookId integer required id of the of the book
     */
    public function showReviewsForBook(Request $request)
    {
        $Validations    = array(
            "bookId"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
       $results = DB::select('select r.id,r.book_id,r.body,r.rating,r.shelf_name,r.likes_count,r.comments_count,r.user_id,r.created_at,r.updated_at,u.name as username, u.image_link as userimagelink from reviews r, users u where r.user_id = u.id and r.book_id = ? order by r.created_at DESC', [$request['bookId']]);
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
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed'
            ),
            400);
    }
}
}
