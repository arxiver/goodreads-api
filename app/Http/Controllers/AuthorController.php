<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
/**
 * Author class
 */
class AuthorController extends Controller
{
    /**
     * get the author by name 
     * @bodyParam auther_name string required Find an author by name.
     */ public function getAuthorByName()
    {
        //
    }
    /**
     * search the author by id
     * @bodyParam author_id integer required the ID of the author you search for.
     */ public function searchAuthor()
    {
    //
    }
}
