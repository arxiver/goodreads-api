<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group following management
 *
 * APIs for managing following process
 */
class followcontroller extends Controller
{
    /**
     * followUser  
     * 
     * Start following a user
     *
     * @authenticated
     *
     * @bodyParam userId int required Goodreads user id of user to follow.
     *
     * @response {
     *  "state" : "true"
     * }
     */
    public function followUser()
    {
        // to do ...
    }
    /**
    * unfollowUser 
    *
    * Stop following a user
    *
    * @authenticated
    *
    * @bodyParam userId int required Goodreads user id of user to stop following.
    *
    * @response {
    *  "state" : "true"
    * }
    */
    public function unfollowUser()
    {
        //to do ....
    }

    /**
     * userFollowers
     * 
     * Get a user's followers
     * 
     * @authenticated
     * 
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam user_id int optional to get the updates made by a specific user (default authenticated user) 
     * @response {
	 *"following": {
	 *	"user": {
	 * 		"id": "000000",
	 *		"name": "Salma",
	 *		"image_url": "https://image.jpg",
	 *		"link": "https://www.goodreads.com/user/show/000000-salma"
	 *	},
	 *	"_start": "1",
	 *	"_end": "1",
	 *	"_total": "1"
	 * }
     *}
     */
    public function userFollowers()
    {
        //to do ....
    }

    /**
     * userFollowering
     * 
     * Get a user's followering
     * 
     * @authenticated
     * 
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam user_id int optional to get the updates made by a specific user (default authenticated user)
     * @response {
	 *"following": {
	 *	"user": {
	 * 		"id": "000000",
	 *		"name": "Salma",
	 *		"image_url": "https://image.jpg",
	 *		"link": "https://www.goodreads.com/user/show/000000-salma"
	 *	},
	 *	"_start": "1",
	 *	"_end": "1",
	 *	"_total": "1"
	 * }
     *}
     */
    public function userFollowing()
    {
        //to do ....
    }
}
