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
	 * followUser  Start following a user 
     * 
     * @authenticated
     * 
     * @bodyParam USER_ID int required Goodreads user id of user to follow.
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
     * unfollowUser Stop following a user
     * 
     * @authenticated
     * 
     * @bodyParam USER_ID int required Goodreads user id of user to stop following.
     * 
     * @response {
     *  "state" : "true"
     * }
     */
    public function unfollowUser()
    {
    	//to do ....
    }
}





