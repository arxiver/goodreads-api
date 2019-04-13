<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    //
    protected $hidden = [
        //'user_id' , 'updated_at'
    ];
    //function to get the following activity of certain users
    public static function FollowingUsersArr($Arr,$auth_id)
    {
        
        $follow=  Following::whereIn('followings.follower_id',$Arr)->join('users as f','f.id','=','followings.user_id')
        ->join('users as u','u.id','=','followings.follower_id')
        ->select('followings.id','followings.updated_at','u.id as user_id',
        'u.image_link as image_link','u.name as name','f.id as followed_id',
        'f.image_link as followed_image_link','f.name as followed_name')->get();
        $t = array();
        $j=0;
       foreach($follow as $l)
        {
            if(Following::where('follower_id',$auth_id)->where('user_id',$l->followed_id)->first()==null)
                $followed = 0;
            else
                $followed = 1;
            $l = collect($l);
            $l ->put('update_type',2);
            $l ->put('auth_user_following',$followed);
           $t[$j]=$l;
           $j++;
        }
        $follow = collect($t);
        return $follow;
    }

}
