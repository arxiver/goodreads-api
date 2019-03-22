<?php

namespace Tests\Unit;
use App\User;
use App\Book;
use App\Shelf;
use App\Review;
use Tests\TestCase;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewsTest extends TestCase
{
    //use RefreshDatabase;
     /**
     * test
     * @return void
     */
    //Function to test the createReview function in the ReviewsController.
    public function testCreateReview()
    {
        // Get the number of shelves in the database
        $shelfCount = Shelf::all()->count();
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // Get the rayingsCount of this user
        $ratingCount = $user['ratingCount'];
        // Get the number of books in the database
        $booksCount = Book::all()->count();
        // Get id for a book in the database to create review with it 
        $randomBookId = rand(1, $booksCount);
        // Get the record of this book
        $book = Book::find($randomBookId);
        // Get the rayingsCount of this book
        $ratingCountBook = $book['ratingsCount'];
        // Get the reviewsCount of this book
		$reviewCountBook = $book['reviewsCount'];
		// Post request for login 
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        // check in the respone about the status in the firstplace
        // check that the respone is valid (The request is done)
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('POST', 'api/reviwes/create', [ 'token'=> $token ,'token_type' =>'bearer' ,'bookId' => 1 , 'rating' => 1 ,
        'shelf'=> 2 ,'body' =>'Woooooooooooooow  it is a great booooook']);
        // Show the response in the cmd
        echo "\n";
        echo $response->content();
        echo "\n";
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
                'status',
                'user',
                'book_id',
                'shelfType',
                'bodyOfReview' ,
                'rate' ,
                'Review_id',
         ]);
         // Convert the response to array to be able to access the elements of the response
         $jsonArray_review = json_decode($response->content(),true);
         // Get the user_id from the response  
         $user_id = $jsonArray_review['user'];
         //show the id in the cmd 
         echo "\n";
         echo "userId  =>  ";
         echo $user_id;
         echo "\n";
         $ratingCount +=1;
         // Check the users table had already this user in it and check that the rating count of him is the ratingcount we got from the above +1
         $this->assertDatabaseHas('users', [
             'id' => $user_id,
             'ratingCount' => $ratingCount
         ]);
         // increment the number of records to get the new one and compare it with the one in the database
         $shelfCount +=1;
         // show the number
         echo "\n";
         echo "shelfCount  =>  ";
         echo $shelfCount;
         echo "\n";
         // check that anew record is created with the new id
         $this->assertDatabaseHas('shelves', [
            'id' => $shelfCount
        ]);
        // Get the review_id from the response  
        $reviewNew = $jsonArray_review['Review_id'];
        // Show the id of the new record in review table
         echo "\n";
         echo "review_id  =>  ";
         echo $reviewNew;
         echo "\n";
        // check that anew record is created with the new id
         $this->assertDatabaseHas('reviews', [
            'id' => $reviewNew
        ]);
        // Get the book_id from the response  
        $bookNew = $jsonArray_review['book_id'];
        // Show the Old ratingCountBook & reviewCountBook of the record in book table
        echo "\n";
        echo "ratingCountBook  =>  ";
        echo $ratingCountBook;
        echo "\n";
        echo "reviewCountBook  =>  ";
        echo $reviewCountBook;
        echo "\n";
        // increment $ratingCountBook
        $ratingCountBook+=1;
        // increment $reviewCountBook
        $reviewCountBook+=1;
        // Show the ratingCountBook & reviewCountBook of the record in book table
        echo "\n";
        echo "ratingCountBook  =>  ";
        echo $ratingCountBook;
        echo "\n";
        echo "reviewCountBook  =>  ";
        echo $reviewCountBook;
        echo "\n";
        // check that the record is modified with the new reviewCountBook & ratingCountBook
        $this->assertDatabaseHas('books', [
            'id' => $bookNew,
            'reviewsCount' => $reviewCountBook,
            'ratingsCount' =>  $ratingCountBook
        ]);
    }



     /**
     * test
     * @return void
     */
    public function testEditReview()
    {
        // the new rating value 
        $newRate =5;
        // Get the number of reviews in the database
        $reviewsCount = Review::all()->count();
        // Get id for a review in the databas eto login with it 
        $randomReviewsId = rand(1, $reviewsCount);
        // Get the record of this review
        $review = Review::find($randomReviewsId);
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);   
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        // check in the respone about the status in the firstplace
        // check that the respone is valid (The request is done)
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Show the old rating in the cmd
        echo "\n";
        echo $review['rating'];
        echo "\n";
        // put request will modify a record to the reviews table 
        // update some atributes in the table book 
        $response = $this->json('PUT', 'api/reviwes/edit', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'rating' => $newRate, 'reviewId'=> $review['id'] ,'body' =>'Baddddd!!!!']);
        // Show the response in the cmd
        echo "\n";
        echo $response->content();
        echo "\n";
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user',
            'review_id',
            'bodyOfReview' ,
            'rate' ,  
     ]);
     // Convert the response to array to be able to access the elements of the response
     $jsonArray_review = json_decode($response->content(),true);
     // Get the review_id from the response  
     $reviewId = $jsonArray_review['review_id'];
     $r=Review::find($reviewId);
     // Show the new rating in the cmd
     echo "\n";
     echo $r['rating'];
     echo "\n";
    }
}
