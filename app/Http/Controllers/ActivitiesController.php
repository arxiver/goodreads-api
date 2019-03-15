<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @group Activities
 *
 * APIs for users activities
 */
class ActivitiesController extends Controller
{
    
    /**
     * updates
     * Get user's updates from following users
     * @authenticated
     * @bodyParam user_id int optional to get the updates made by a specific user (default all following)
     * @bodyParam max_updates int optional to get the max limit of updates.
     * @responseFile responses/updatesReal.json 
     */
    public function followingUpdates($user_id,$max_updates)
    {

    } 
    /**
     * notifications
     * gets a user's notifications
     * @authenticated
	 * @bodyParam page int optional 1-N (default 1).
     * @response
     * {
	 *  "notifications": {
	 *	"notification": [
	 *		{
	 *			"id": "1",
	 *			"actors": {
	 *				"user": {
	 *					"id": "000000"
	 *					"name": "Salma",
	 *					"link": "https://www.goodreads.com/user/show/000000-salma\n",
	 *					"image_url":"\nhttps://images.jpg\n",
	 *					"has_image": "true"
	 *				}
	 *			},
	 *			"new": "true",
	 *			"created_at": "2019-03-08T04:15:46-08:00",
	 *			"url": "https://www.goodreads.com/comment/show/1111111",
	 *			"resource_type": "Comment",
	 *			"group_resource_type": "ReadStatus"
	 *		},
	 *		}
	 *	  ]
	 *  }
     * }
     */
    public function notifications()
    {

    }
    /**
     * comment
     * @bodyParam id int required id of the commented resource.
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review).
     * @bodyParam body string required the body of the comment .
     * @authenticated.
     * @response {
	 * 	"state":"true"
	 * }
     */
    public function makeComment()
    {

	}
	/**
     * delete comment
     * @bodyParam id int required comment id
     * @authenticated
     * @response {
	 * 	"state":"true"
	 * }
     */
	public function deleteComment()
	{

	}

    /**
    * list comments
    * lists comments for a specific resource(review,update)
    * @bodyParam id required int id of the commented resource
	* @bodyParam type int required type of the resource (1 for user status and 2 for review)
 	* @response
    * {
	*	"comment": {
    * 	"comments"[
	*		"comment": {
	*			"id": "0000000",
	*			"user": {
	*				"id": "000000",
	*				"name": "aa",
	*				"location": "The United States",
	*				"link": "\nhttps://www.goodreads.com/user/show/000000-aa\n",
	*				"image_url": "\nhttps://s.gr-assets.png\n",
	*				"has_image": "false"
	*				},
	*			"date_added": "Fri Mar 08 16:25:10 -0800 2019",
	*			"date_updated": "Fri Mar 08 16:25:22 -0800 2019",
	*			"link": "\nhttps://www.goodreads.comshow/00000\n",
	*			"body":"a great book"
	*  		}
	* 		],
	*		"_type": "array"
	*	}
    * }
    */    
    public function listComments()
    {
        
    }
    /**
     * like
     * @bodyParam id int required id of the liked resource
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review)
     * @response {true}
     */
    public function makeLike()
    {
        
	}
	
    /**
     * unlike
     * @bodyParam id int required like id
     * @authenticated
     * @response {state:true}
     */
	public function unlike()
	{

	}

    /**
     * list likes
     * lists likes for a specific resource(review,update)
     * @bodyParam id int required id of the liked resource
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review)
     * @authenticated
     * @response
     * {
     * likes[
	 *"like": {
	 *	"id": "0000000",
	 *	"user": {
	 *		"id": "000000",
	 *		"name": "aa",
	 *		"location": "The United States",
	 *		"link": "\nhttps://www.goodreads.com/user/show/000000-aa\n",
	 *		"image_url": "\nhttps://s.gr-assets.png\n",
	 *		"has_image": "false"
	 *	},
	 *	
	 *	"date_added": "Fri Mar 08 16:25:10 -0800 2019",
	 *	"date_updated": "Fri Mar 08 16:25:22 -0800 2019",
	 *	"link": "\nhttps://www.goodreads.comshow/00000\n",
	 *  }
     * ]
     *}
     */    
    public function listLikes()
    {
        
    }
}
