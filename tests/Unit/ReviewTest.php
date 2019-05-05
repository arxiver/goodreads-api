<?php


namespace Tests\Unit;
use App\User;
use App\Book;
use App\Review;
use App\Shelf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ReviewController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
class ReviewTest extends TestCase
{

    /**
     * test
     * @return void
     */
    public function DeleteReview($reviewNew,$token,$user)
    {
        // Get all id's of reviews
        $reviewsCount = Review::all()->count();
        // Get the ratings_count of this user
        $rating_count = $user['rating_count'];
        // Get the record of this review
        $review = Review::find($reviewNew);
        //get reviewid
        $reviewId = $review['id'];
        // Get the record of this book
        $book = Book::find($review['book_id']);
        // Get the rayingsCount of this book
        $rating_countBook = $book['ratings_count'];
        // Get the reviews_count of this book
		$reviewCountBook = $book['reviews_count'];
		// delete the review 
        $response = $this->json('DELETE', 'api/reviwes/delete', [ 'token'=> $token ,
        'token_type' =>'bearer' , 'reviewId' =>$reviewId ]);
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
              'status',
              'userId',
              'ratings_countUser',
              'rating_avgUser',
              'BookId',
              'ratings_avgBook',
              'reviews_countBook',
              'ratings_countBook',
              'NumberOfDeletedCommentsOnThisReview',
              'NumberOfDeletedLikesOnThisReview'
         ]);
         // Convert the response to array to be able to access the elements of the response
         $jsonArray_review = json_decode($response->content(),true);
         // Get the user_id from the response  
         $user_id = $jsonArray_review['userId'];
         $rating_count -=1;
         if ($rating_count < 0){$rating_count=0;}
         // Check the users table had already this user in it and check that the rating count of him is the rating_count we got from the above +1
         $this->assertDatabaseHas('users', [
             'id' => $user_id,
             'rating_count' => $rating_count
         ]);
         // Get all id's of reviews
        $reviewsCountNew = Review::all()->count();
        // check that anew record is deleted in the review
        $reviewsCount-=1;
        $this->assertEquals($reviewsCount,$reviewsCountNew);
        // Get the book_id from the response  
        $bookNew = $jsonArray_review['BookId'];
        // increment $rating_countBook
        $rating_countBook-=1;
        if ($rating_countBook < 0){$rating_countBook=0;}
        // increment $reviewCountBook
        $reviewCountBook-=1;
        if ($reviewCountBook < 0){$reviewCountBook=0;}      
        // check that the record is modified with the new reviewCountBook & rating_countBook
        $this->assertDatabaseHas('books', [
            'id' => $bookNew,
            'reviews_count' => $reviewCountBook,
            'ratings_count' =>  $rating_countBook
        ]);
    }

    //use RefreshDatabase;
     /**
     * test
     * @return void
     */
   public function testCreateReview()
    {
        $rate=2;
        // Get the number of shelves in the database
        $shelfCount = Shelf::all()->count();
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 7;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // Get the ratings_count of this user
        $rating_count = $user['rating_count'];
        // Get the number of books in the database
        $booksCount = Book::all()->count();
        // Get id for a book in the database to create review with it 
        $randomBookId = rand(1, $booksCount);
        // Get the record of this book
        $book = Book::find($randomBookId);
        // Get the rayingsCount of this book
        $rating_countBook = $book['ratings_count'];
        // Get the reviews_count of this book
		$reviewCountBook = $book['reviews_count'];
		// Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('POST', 'api/reviwes/create', [ 'token'=> $token ,'token_type' =>'bearer' ,'bookId' => $book['id'], 'rating' => $rate ,
        'shelf'=> 2 ,'body' =>'Woooooooooooooow  it is a great booooook']);
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
         $rating_count +=1;
         // Check the users table had already this user in it and check that the rating count of him is the rating_count we got from the above +1
         $this->assertDatabaseHas('users', [
             'id' => $user_id,
             'rating_count' => $rating_count
         ]);
         
        // Get the review_id from the response  
        $reviewNew = $jsonArray_review['Review_id'];
        // check that anew record is created with the new id
         $this->assertDatabaseHas('reviews', [
            'id' => $reviewNew
        ]);
        // Get the book_id from the response  
        $bookNew = $jsonArray_review['book_id'];
        // increment $rating_countBook
        $rating_countBook+=1;
        // increment $reviewCountBook
        $reviewCountBook+=1;
        // check that the record is modified with the new reviewCountBook & rating_countBook
        $this->assertDatabaseHas('books', [
            'id' => $bookNew,
            'reviews_count' => $reviewCountBook,
            'ratings_count' =>  $rating_countBook
        ]);

        $this->DeleteReview($reviewNew,$token,$user);
    }
}
