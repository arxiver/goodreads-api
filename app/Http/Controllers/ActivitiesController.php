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
     * @response 
     * {"updates": {
	 *	"update": [
	 *		{
	 *			"link": "https://www.goodreads.com/review/show/2742801555",
	 *			"image_url": "https://images.gr-assets.com/books/1388255167s/31087.jpg",
	 * 			"actor": {
	 *				"id": "000000",
	 *				"name": "Salma",
	 * 				"image_url": "https://image.jpg",
	 *				"link": "https://www.goodreads.com/user/show/000000-salma"
	 *			},
	 *			"updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
	 *			"action": {
	 *				"rating": "5",
	 *				"_type": "rating"
	 *			},
	 *			"object": {
	 *				"book": {
	 * 					"id": "31087",
	 * 					"title": "The Last Boleyn",
	 *					"link": "https://www.goodreads.com/book/show/31087.The_Last_Boleyn",
	 * 					"authors": {
	 *						"author": {
	 *							"id": "17450",
	 *							"name": "Karen Harper"
	 *						}
	 *					}
	 *				}
	 *			},
	 *			"type": "rate"
	 *		}
	 *	],
	 *	"_type": "array"
	 *  }
     *}
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
     * @bodyParam id int required id of the commented resource
     * @bodyParam body string required the body of the comment
     * @authenticated
     * @response {true}
     */
    public function makeComment()
    {

    }
    /**
     * list comments
     * lists comments for a specific resource(review,update)
     * @bodyParam id required int id of the commented resource
     * @response
     * {
     * comments[
	 *"comment": {
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
	 *	"body":"a great book"
	 *  }
     * ]
     *}
     */    
    public function listComments()
    {
        
    }
    /**
     * like
     * @bodyParam id int required id of the liked resource
     * @response {true}
     */
    public function makeLike()
    {
        
    }
    /**
     * list likes
     * lists likes for a specific resource(review,update)
     * @bodyParam id int required id of the liked resource
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
