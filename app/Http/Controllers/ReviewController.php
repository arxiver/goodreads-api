<?php

namespace App\Http\Controllers;
use App\User;
use App\Review;
use App\Shelf;
use Illuminate\Http\Request;
use DB;
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
     * @bodyParam bookId int required The book id has reviewed  to be created.
     * each state of the shelf is represented by a number
     * @bodyParam shelf int required (read->0,currently-reading->1,to-read->2) default is (read) .
     * @bodyParam body optional string optional The text of the review.
     * @bodyParam rating int optional Rating (0-5) default is 0 (No rating).
     * 
     * 
     *
     * @response {
     *  "state" : "Invalid review you must make rate"
     * }
     *
     * @response {
     *  "state" : "you cannot make review without rating"
     * }
     *
     * @response {
     *  "state" : "your review is saved "
     * }
     */
    public function createReview(Request $request)
    {
        if(!empty($request["rating"]))
        {
            die("good function");
        }
        else
        {
            die("bad functoin");
        }
        if(($request["rating"] == 4) && ($request["body"] == 5))
        {
            die("im here");
            //die();
            return response()->json([
                'state' => 'Invalid review you must make rate'
            ]);
       } 
       
       elseif(($request["rating"] == NULL) && ($request["body"] != NULL))
       {
            return response()->json([
                'state' => 'you cannot make review without rating'
            ]);
       }

       elseif(($request["rating"] != NULL) && ($request["body"] == NULL))
       {
           /*if ($reuqst["shelf"] != 0)
           {
                $userId=$this->ID;
                Shelf::create(request(['userId','bookId','type']));
           }*/
            $userId=$this->ID;
            Review::create(request(['userId','bookId','body','rating']));
            return response()->json([
                'state' => 'your review is saved '
            ]);
       }
       else
       {
           /*if ($request["shelf"] != 0)
           {
            $userId=$this->id;
                Shelf::create(request(['userId','bookId','type']));
           }*/
           $userId=$this->id;
            Review::create(request(['userId','bookId','body','rating']));
            return response()->json([
                'state' => 'your review is saved '
            ]);
       }

    }

    /**
     * Edit a review
     * @authenticated
     * @bodyParam reviewId int required Review Id.
     * @bodyParam body text optional The text of the review.
     * @bodyParam rating int required Rating (0-5) default is the same as it was .
     * @response {
     *  "state" : "Invalid review update"
     * }
     *
     * @response {
     *  "state" : "you cannot make review update without rating"
     * }
     *
     * @response {
     *  "state" : "your review is updated "
     * }
     */
    public function editReview(Request $request)
    {
        if(($request["rating"] == NULL) && ($request["body"] == NULL))
       {
            return response()->json([
                'state' => 'Invalid review update'
            ]);
       } 
       elseif(($request["rating"] == NULL) && ($request["body"] != NULL))
       {
            return response()->json([
                'state' => 'you cannot make review update without rating'
            ]);
       }
       else
       {
            $review = Review::findOrFail($reviewId);
            $review->update(request(['body','rating']));
            return response()->json([
                'state' => 'your review is updated '
            ]);
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
     * List thee reviews for a specific user
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
