<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\user;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public $ID = 0 ;
    public function __construct()
    {
        if(auth()->user())
        {
            $this->ID = (auth()->payload())->get("sub");
        }
    }
    public function GetUserByID()
    {
        return User::find($this->ID)->first();
    }
    public function GetUrl()
    {
        return asset("storage/avatars/");
    }
    public function UserOrGuest()
    {
        if(auth()->user())
        {
            return "User";
        }
        else
        {
            return "Guest";
        }
    }
}

