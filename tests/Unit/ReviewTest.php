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
        $randomUserId = 1;//rand(1, $usersCount);
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
        // Show the response in the cmd
        //echo "\n";
        //echo $response->content();
        //echo "\n";
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
         //echo "\n";
         //echo "userId  =>  ";
         //echo $user_id;
         //echo "\n";
         $rating_count +=1;
         // Check the users table had already this user in it and check that the rating count of him is the rating_count we got from the above +1
         $this->assertDatabaseHas('users', [
             'id' => $user_id,
             'rating_count' => $rating_count
         ]);
         // increment the number of records to get the new one and compare it with the one in the database
         $shelfCount +=1;
         // show the number
         //echo "\n";
         //echo "shelfCount  =>  ";
         //echo $shelfCount;
         //echo "\n";
         // check that anew record is created with the new id
         $this->assertDatabaseHas('shelves', [
            'id' => $shelfCount
        ]);
        // Get the review_id from the response  
        $reviewNew = $jsonArray_review['Review_id'];
        // Show the id of the new record in review table
        // //echo "\n";
        // echo "review_id  =>  ";
        // echo $reviewNew;
        // echo "\n";
        // check that anew record is created with the new id
         $this->assertDatabaseHas('reviews', [
            'id' => $reviewNew
        ]);
        // Get the book_id from the response  
        $bookNew = $jsonArray_review['book_id'];
        // Show the Old rating_countBook & reviewCountBook of the record in book table
       // echo "\n";
       // echo "rating_countBook  =>  ";
        //echo $rating_countBook;
        //echo "\n";
        //echo "reviewCountBook  =>  ";
        //echo $reviewCountBook;
        //echo "\n";
        // increment $rating_countBook
        $rating_countBook+=1;
        // increment $reviewCountBook
        $reviewCountBook+=1;
        // Show the rating_countBook & reviewCountBook of the record in book table
        //echo "\n";
        //echo "rating_countBook  =>  ";
        //echo $rating_countBook;
        //echo "\n";
        //echo "reviewCountBook  =>  ";
        //echo $reviewCountBook;
        //echo "\n";
        // check that the record is modified with the new reviewCountBook & rating_countBook
        $this->assertDatabaseHas('books', [
            'id' => $bookNew,
            'reviews_count' => $reviewCountBook,
            'ratings_count' =>  $rating_countBook
        ]);
    }



     /**
     * test
     * @return void
     */
    public function testEditReview()
    {
        // the new rating value 
        $newRate =2;
        // Get all id's of users
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId); 
        // show the user id 
        //echo "\n";
        //echo 'userId  => ';
       // echo $randomUserId;
       // echo "\n";
        //select a review from the review of this user to edit it 
        $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
        // assertion fail when a user doesn't have a review 
        $this->assertNotEmpty($reviewByUser);
        // show the reviewId
        ///echo "\n";
        ///echo 'reviewId => ';
        //echo $reviewByUser[0]->id;
        ///echo "\n";
        // store the reviewId
        $reviewId = $reviewByUser[0]->id;
        // Get the record of this review
        $review = Review::find($reviewId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Show the old rating in the cmd
        //echo "\n";
        //echo 'oldRate => ';
        //echo $review['rating'];
        //echo "\n";
        // put request will modify a record to the reviews table 
        // update some atributes in the table book 
        $response = $this->json('PUT', 'api/reviwes/edit', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'rating' => $newRate, 'reviewId'=> $review['id'] ,'body' =>'Baddddd!!!!']);
        // Show the response in the cmd
        //echo "\n";
        //echo $response->content();
        ///echo "\n";
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
     $reviewIdTwo = $jsonArray_review['review_id'];
     $r=Review::find($reviewIdTwo);
     // Show the new rating in the cmd
     //echo "\n";
     //echo 'newRate => ';
     //echo $r['rating'];
     //echo "\n";
    }


    /**
     * test
     * @return void
     */
    public function testDeleteReview()
    {
        // Get all id's of reviews
        $reviewsCount = Review::all()->count();
        // Get all id's of users
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId); 
        // show the user id 
        //echo "\n";
        //echo 'userId  => ';
        //echo $randomUserId;
        //echo "\n";
        // Get the ratings_count of this user
        $rating_count = $user['rating_count'];
        //select a review from the review of this user to edit it 
        $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
        // assertion fail when a user doesn't have a review 
        $this->assertNotEmpty($reviewByUser);
        // show the reviewId
        //echo "\n";
        //echo 'reviewId => ';
        //echo $reviewByUser[0]->id;
        //echo "\n";
        // store the reviewId
        $reviewId = $reviewByUser[0]->id;
        // Get the record of this review
        $review = Review::find($reviewId);
        // Get the record of this book
        $book = Book::find($review['book_id']);
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
        // delete request will  
        // delete a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('DELETE', 'api/reviwes/delete', [ 'token'=> $token ,
        'token_type' =>'bearer' , 'reviewId' =>$reviewId ]);
        // Show the response in the cmd
        //echo "\n";
        //echo $response->content();
        //echo "\n";
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
        // Show the Old rating_countBook & reviewCountBook of the record in book table
        //echo "\n";
        //echo "rating_countBook  =>  ";
        //echo $rating_countBook;
        //echo "\n";
        //echo "reviewCountBook  =>  ";
       // echo $reviewCountBook;
       // echo "\n";
        // increment $rating_countBook
        $rating_countBook-=1;
        if ($rating_countBook < 0){$rating_countBook=0;}
        // increment $reviewCountBook
        $reviewCountBook-=1;
        if ($reviewCountBook < 0){$reviewCountBook=0;}
        // Show the rating_countBook & reviewCountBook of the record in book table
        //echo "\n";
        //echo "rating_countBook  =>  ";
        //echo $rating_countBook;
        ///echo "\n";
        ///echo "reviewCountBook  =>  ";
        //echo $reviewCountBook;
        //echo "\n";
        // check that the record is modified with the new reviewCountBook & rating_countBook
        $this->assertDatabaseHas('books', [
            'id' => $bookNew,
            'reviews_count' => $reviewCountBook,
            'ratings_count' =>  $rating_countBook
        ]);
    }
}
