<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
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
     * @bodyParam book_id int required The book id has reviewed  to be created.
     * @bodyParam shelf int required (read,currently-reading,to-read) default is (read) .
     * @bodyParam review optional string optional The text of the review.
     * @bodyParam rating int optional Rating (0-5) default is 0 (No rating).
     * @bodyParam read_at date optional (YYYY-MM-DD format, e.g. 2008-02-01).
     */
    public function createReview()
    {
        //
    }

    /**
     * Edit a review
     * @authenticated
     * @bodyParam review_id int required Review Id.
     * @bodyParam review text optional The text of the review.
     * @bodyParam shelf_name string optional (read,currently-reading,to-read)  .
     * @bodyParam rating int optional Rating (0-5) default is the same as it was .
     * @bodyParam read_at date optional  default is (the same as it was).
     */
    public function editReview()
    {
        //
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
     * @bodyParam review_id int required The id of review to be deleted.
     */
    public function destroy($id)
    {
        //
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
        //
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
    public function showReviewOfBook()
    {
        //
    }


    /**
     * Get the review for specific user on a specific Book 
     * @authenticated
     * @bodyParam userId required id of the of the user
     * @bodyParam bookId required id of the of the book 
     */
    public function showReviewForBookForUser()
    {
        //
    }
}
