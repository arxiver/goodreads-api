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
     * 
     * @response {
     *  "idFollowers" : "123"
     * }
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
     * 
     * @response {
     *  "idFollowing" : "123"
     * }
     */
    public function userFollowing()
    {
        //to do ....
    }
}
