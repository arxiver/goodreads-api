<?php

namespace App\Http\Controllers;

use App\OwnedBook;
use Illuminate\Http\Request;

/**
 * @group Owned Books
 *
 * APIs for GoodReads
 */
class OwnedBookController extends Controller
{

    /**
     * List all owned books of the authenticated user
     * @authenticated
     */
    public function index()
    {
        //
    }

    /**
     * Add to books owned
     * @authenticated
     *
     * @bodyParam book_id int required The id of the book.
     * @bodyParam condition_description string optional The id of the book.
     *
     */
    public function create()
    {
        //
    }


    /**
     * Delete an owned book
     * @authenticated
     *
     * @bodyParam book_id int required The id of the book record.
     */
    public function destroy(OwnedBook $ownedBook)
    {
        //
    }
    /**
     * List books owned by a user
     * @authenticated
     *
     * @bodyParam user_id int required The id of the user.
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     *
     */
    public function list(Request $request)
    {

    }
}
