<?php

namespace App\Http\Controllers;

use App\Book;
use DB;
use Response;
use Validator;

use Illuminate\Http\Request;

/**
 * @group Book
 *
 *
 *
 * */

class BookController extends Controller
{

    /**
     *
     * List all books
     *
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam books_per_page int optional (default 10).
     *
     * @response {
     * "book_title": "Would you die for me?",
     * "isbn": "1234xxxxxx",
     * "image_url": "lookdown.jpg",
     * "small_image_url": "xyz.com/images/uvw.jpg",
     * "num_pages": "1000",
     * "publisher": "dummyMan",
     * "publication_day": 13 ,
     * "publication_year": 1932 ,
     * "publication_month": 10  ,
     * "average_rating": 3.532,
     * "ratings_count": 1,
     * "description": "dummy",
     * "author_id" : 1,
     * "author_name" : "author",
     * "genre" : "action"
     * }
     *
     */
    public function index()
    {
        //
    }
    /**
     * @group [Book].Show
     *   Show books by id
     *
     * function is responsible for showing books by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * book_id.
     * @authenticated
     * @bodyParam book_id int required The id of the book.
     * @response {
     * "status":"success",
     * "pages" : [
     * {
     *"id": 1000000,
     *       "title": "ppp",
     *      "isbn": 1,
     *     "img_url": "dsds",
     *    "publication_date": "2019-03-21",
     *   "publisher": "fgdg",
     *  "language": "dfgdg",
     * "description": "fdgd",
     *"reviews_count": 4,
     *"ratings_count": 5,
     *"ratings_avg": 9,
     *"link": "jyj",
     *"author_id": 1000000,
     *"pages_no": 8,
     *"created_at": "2019-03-21 00:00:00",
     *"updated_at": "2019-03-21 00:00:00",
     *"genre": "action"
     * }
     * ]
     * }
     */
    public function show (Request $request)
    {
        
        $Validations    = array(
            "book_id"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select b.id , a.author_name as author_name ,b.title,b.isbn,b.img_url,b.publication_date,b.publisher,b.language,b.description,b.reviews_count,b.ratings_count,b.ratings_avg,b.author_id,b.pages_no,b.created_at,b.updated_at,g.type as genre from books b , genre g , authors a where b.id = g.book_id and a.id=b.author_id and b.id = ?', [$request['book_id']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this id',
                'pages' => $results),
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this id',
            ),
            400);
    }

    }

    /**
     *  @group [Book].get Book By genre
     *   Show books by genre
     * 
     * function is responsible for showing books by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * genre type.
     * @authenticated
     * @bodyParam genreName string required The Genre of list of books.
     * @response {
     * "status" : "success",
     * "pages" :[
     * {
    * "id": 1000000,
     *       "title": "ppp",
      *      "isbn": 1,
       *     "img_url": "dsds",
        *    "publication_date": "2019-03-21",
         *   "publisher": "fgdg",
          *  "language": "dfgdg",
           * "description": "fdgd",
            *"reviews_count": 4,
            *"ratings_count": 5,
            *"ratings_avg": 9,
            *"link": "jyj",
            *"author_id": 1000000,
            *"pages_no": 8,
            *"created_at": "2019-03-21 00:00:00",
            *"updated_at": "2019-03-21 00:00:00",
            *"genre": "action"
     * }
     * ]
     * }
     */
    public function showByGenre(Request $request)
    {
        //
        $Validations    = array(
            "genreName"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select * from books b , genre g , authors a  where b.id = g.book_id and b.author_id=a.id and g.type = ?', [$request['genreName']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this title',
                'pages' => $results),
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this title',
            ),
            400);
    }
    }
    /**
     * @group [Book].get Book By title
     *  get the needed book by its name
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * title.
     * @authenticated
     * @bodyParam title string required Find books by title
     * @response {
     * "status" : "success",
     * "pages" : [
     * {
     *       "id": 1000000,
     *       "title": "ppp",
      *      "isbn": 1,
       *     "img_url": "dsds",
        *    "publication_date": "2019-03-21",
         *   "publisher": "fgdg",
          *  "language": "dfgdg",
           * "description": "fdgd",
            *"reviews_count": 4,
            *"ratings_count": 5,
            *"ratings_avg": 9,
            *"link": "jyj",
            *"author_id": 1000000,
            *"pages_no": 8,
            *"created_at": "2019-03-21 00:00:00",
            *"updated_at": "2019-03-21 00:00:00",
            *"genre": "action"
     *   }
     *  ]
     * }
     */
    public function getBookByTitle(Request $request)
    {
        $Validations    = array(
            "title"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select b.id,a.author_name,b.title,b.isbn,b.img_url,b.publication_date,b.publisher,b.language,b.description,b.reviews_count,b.ratings_count,b.ratings_avg,b.author_id,b.pages_no,b.created_at,b.updated_at,g.type as genre from books b , genre g , authors a where b.id = g.book_id and a.id=b.author_id and b.title = ?', [$request['title']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this title',
                'pages' => $results),
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this title',
            ),
            400);
    }
    }
    /**
     * @group [Book].get Book By Isbn
     *    get the needed book by its ISBN
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language,
     * description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * isbn.
     * @authenticated
     * @bodyParam ISBN int required Find books by ISBN
     * @response {
     * "status" : "success",
     * "pages" : [
     * {
     * "id": 1000000,
     *       "title": "ppp",
      *      "isbn": 1,
       *     "img_url": "dsds",
        *    "publication_date": "2019-03-21",
         *   "publisher": "fgdg",
          *  "language": "dfgdg",
           * "description": "fdgd",
            *"reviews_count": 4,
            *"ratings_count": 5,
            *"ratings_avg": 9,
            *"link": "jyj",
            *"author_id": 1000000,
            *"pages_no": 8,
            *"created_at": "2019-03-21 00:00:00",
            *"updated_at": "2019-03-21 00:00:00",
            *"genre": "action"
     * }
     * ]
     * }
     */
    public function getBookByIsbn(Request $request)
    {
        //
        $Validations    = array(
            "ISBN"         => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select b.id,a.author_name,b.title,b.isbn,b.img_url,b.publication_date,b.publisher,b.language,b.description,b.reviews_count,b.ratings_count,b.ratings_avg,b.author_id,b.pages_no,b.created_at,b.updated_at,g.type as genre from books b , genre g , authors a where b.id = g.book_id and a.id=b.author_id and b.isbn = ?', [$request['ISBN']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books by this isbn',
                'pages' => $results),
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books by this isbn or no genre for it',
            ),
            400);
    }
    }
    /**
     * @group [Book].get Book By Author Name
     *    search about the needed book by its Author name
     * 
     * this function is responsible for showing certain book by
     * returning the (id,title,publication_date, isbn, image url,publisher,language
     * ,description,reviews count,rating count,link,author id,genre)
     * all of that formed by sending the parameters which :-
     * author name
     * @authenticated
     * @bodyParam Author_name string required Find books by Author's name.
     * @response {
     * "status": "success",
     * "pages" :[
     *  {
     *      "id": 1000000,
     *       "title": "ppp",
     *       "isbn": 1,
     *       "img_url": "dsds",
     *       "publication_date": "2019-03-21",
     *       "publisher": "fgdg",
     *       "language": "dfgdg",
     *       "description": "fdgd",
     *       "reviews_count": 4,
     *       "ratings_count": 5,
     *       "ratings_avg": 9,
     *       "link": "jyj",
     *       "author_id": 1000000,
     *       "pages_no": 8,
     *       "created_at": "2019-03-21 00:00:00",
     *       "updated_at": "2019-03-21 00:00:00",
     *       "genre": "action"
     *  }
     * ]
     * }
     */
    public function getBookByAuthorName(Request $request)
    {
        //
        $Validations    = array(
            "Author_name"         => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
        $results = DB::select('select b.id,b.title,b.isbn,b.img_url,b.publication_date,b.publisher,b.language,b.description,b.reviews_count,b.ratings_count,b.ratings_avg,b.link,b.author_id,b.pages_no,b.created_at,b.updated_at,g.type as genre from books b , genre g , authors a where b.id = g.book_id and a.id = b.author_id and a.author_name=?', [$request['Author_name']]);
        if($results != NULL){
            return Response::json(array(
                'status' => 'success',
                'pages' => $results),
                200);
        }
        else{
            return Response::json(array(
                'status' => 'failed, may be there is no books have this author name',
                'pages' => $results),
                400);
        }
    }
    else{
        return Response::json(array(
            'status' => 'failed, may be there is no books have this author name',
            ),
            400);
    }
    }
}
