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
	 *  followUser  Start following a user 
     *  @bodyParam USER_ID int required Goodreads user id of user to follow.
     *  
     *  @response {
     *  "state"
     * }
	 */
    public function followUser()
    {
        // to do ...
    }
     /**
     *  unfollowUser Stop following a user
     *  @bodyParam USER_ID int required Goodreads user id of user to stop following.
     * 
     *  @response {
     *  "state"
     *  }
     */
    public function unfollowUser()
    {
    	//to do ....
    }
}
