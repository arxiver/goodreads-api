<?php

namespace App\Http\Controllers;

use App\Shelf;
use Illuminate\Http\Request;
/**
 * @group Shelf
 * @authenticated
 * APIs for GoodReads
 */
class ShelfController extends Controller
{
    /**
     * List all shelves of the authenticated user .
     * @authenticated
     */
    public function index()
    {
        //
    }

    /**
     * Create a new book shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the new shelf.
     */
    public function create()
    {
        //
    }

    /**
     * Show a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @return \Illuminate\Http\Response
     */
    public function show(Shelf $shelf)
    {
        //
    }

    /**
     * Add a book to a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @bodyParam book_id int required The id of the book.
     */
    public function addBook(Request $request)
    {
        //
    }


    /**
     * Remove a book from a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     * @bodyParam book_id int required The id of the book.
     */
    public function removeBook( Request $request)
    {
        //
    }
    /**
     * Get User`s shelves
     * @authenticated
     * @bodyParam user_id int required The name of the shelf.
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     */
    public function userShelves($user_id)
    {

    }
    /**
     * Destroy a shelf
     * @authenticated
     * @bodyParam shelf_name string required The name of the shelf.
     */
    public function destroy(Shelf $shelf)
    {
        //
    }
    /**
     * show books on the shelf
     * @bodyParam user_id integer required Get the books on a member's shelf.
     */
	public function getBooksOnShelf()
	{
        //
    }
}
