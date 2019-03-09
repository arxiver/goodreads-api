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
     * List all reviews of the authenticated user
     * @authenticated
     */
    public function index()
    {
        //
    }

    /**
     * Create a review
     * @authenticated
     * @bodyParam book_id int required The book id has reviewed  to be created.
     * @bodyParam shelf int required (read,currently-reading,to-read) default is (read) .
     * @bodyParam review optional string optional The text of the review.
     * @bodyParam rating int optional Rating (0-5) default is 0 (No rating).
     * @bodyParam read_at date optional (YYYY-MM-DD format, e.g. 2008-02-01).
     */
    public function create()
    {
        //
    }

    /**
     * Show a review of a specified book
     * @authenticated
     * @bodyParam id int required The id of the review .
     */
    public function show($id)
    {
        //
    }

    /**
     * Edit a review
     * @authenticated
     * @bodyParam id int required Review Id.
     * @bodyParam review text optional The text of the review.
     * @bodyParam shelf_name string optional (read,currently-reading,to-read)  .
     * @bodyParam rating int optional Rating (0-5) default is the same as it was .
     * @bodyParam read_at date optional  default is (the same as it was).
     */
    public function edit()
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
    //
    /**
     * Get a user's review for a given book.
     * @authenticated
     * @bodyParam user_id int required id of the user.
     * @bodyParam book_id int required  id of the book.
     *
     */
    public function userReview()
    {
        //
    }
    /**
     * Get a book`s reviews by users.
     * @authenticated
     * @bodyParam book_id int required book_id you want to show its reviews.
     *
     */
    public function bookReview()
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
}
