<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
class update extends Model
{
    //
    protected $attributes = [
        'numComments' => 0,
        'numLikes' => 0
    ];
    public static function followingUpdates()
    {
        $authId = 1;
        //$collection = collect();
        $collection = array();
        //get authenticated user following
        $following = DB::table('followings')->where('user_id','=',1)->select('follower_id')->get();
        $followingArr= json_decode( json_encode($following), true);
        //return $following->follower_id;
        $updates = update::whereIn('actorId',$followingArr)->orderBy('created_at','desc')->get();
        //return $following[$i]->follower_id;
        $i=0;
        foreach($updates as $update)
        {   
            $t = collect($update);
            return $t->forget("id");
           return $update;
            $u = collect();
            
            //$u=$u->concat("2");
            //get actor user data
            $actor = DB::table('users')->where('id','=',$update->actorId)->select('id','name','imageLink')->get();
           //return $update;
            $update ->forget(0);
           return $update;
            $update = json_decode( json_encode($update), true);
            $u = $u->concat($update);
            $actor= json_decode( json_encode($actor), true);
            $u=$u->concat($actor);
            //Arr::set($u,'actor',$actor);
            return $u;
            //add keys to u then add it to collection
            $key =collect("id","actionType","numComments","numLikes","created_at","actor"); 
            //$u = array_fill_keys($key,$u[0]);
            $u =$key->combine($u);
            //$collection=$collection->concat($u);
            $collection[$i]=$u->toJson();
            $i++;
            
            
        }
        //$collection=$key->combine($collection);
        return $collection;
    }

}
