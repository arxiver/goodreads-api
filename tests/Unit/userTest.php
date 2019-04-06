<?php

namespace Tests\Unit;
use App\Review;
use App\Book;
use App\Http\Controllers\ReviewController;
use Tests\TestCase;
use Illuminate\App\Http\Request;
use DB;
use Validator;
use Response;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;

class userTest extends TestCase
{
    
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function createtest()
    {

        $tt1 = new Review;
        $tt2=new ReviewController;
        $tt3 = new Book;
        $tt3->setauthor(1000000,'a7med7amdy','2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->setBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,'jyj',1000000,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->setgenre(1000000,1000000,'action');
        $user=$tt1->getuser(); 
       $tt1->setshowReviewOfBook(1000000,((int)$user),1000000,'dsds',0,5,4,4,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $this->assertTrue(true);

    }

    public function testExample1()
    {
        $res=$this->json('get','api/Books/book_Authorname',['Author_name'=>'a7med7amdy']);
        $data = json_decode($res->getContent(),true);
      //  $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }

    public function test1()
        {
            $tt1 = new Review;
            $tt2=new ReviewController;
           $res=$this->json('get','api/reviwes/books',['title'=>'ppp']);
            $data = json_decode($res->getContent(),true);
          //  $this->assertEquals(2 , $data['pages'][0]['user_id']);
            $this->assertEquals(1000000 , $data['pages'][0]['book_id']);
            $this->assertEquals('dsds',$data['pages'][0]['body']);
            $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
            $this->assertEquals(5 , $data['pages'][0]['rating']);
            $this->assertEquals(4 , $data['pages'][0]['likes_count']);
            $this->assertEquals(4 , $data['pages'][0]['comments_count']);
        }
    public function test2()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $res=$this->json('get','api/showReviewOfBook',['reviewId'=>'1000000']);
        $data = json_decode($res->getContent(),true);
      //  $this->assertEquals(2 , $data['pages'][0]['user_id']);
        $this->assertEquals(1000000 , $data['pages'][0]['book_id']);
        $this->assertEquals('dsds',$data['pages'][0]['body']);
        $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
        $this->assertEquals(5 , $data['pages'][0]['rating']);
        $this->assertEquals(4 , $data['pages'][0]['likes_count']);
        $this->assertEquals(4 , $data['pages'][0]['comments_count']);
    }
    public function test3()
    {
        $tt1 = new Review;
        $tt2=new ReviewController;
        $resp=$tt1->getuser();
        $res=$this->json('get','api/showReviewForBookForUser',['userId'=>(string)$resp,'bookId'=>'1000000']);
      //  $res= $tt2->showReviewForBookForUser(2,1000000)->getContent();
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('dsds',$data['pages'][0]['body']);
        $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
        $this->assertEquals(5 , $data['pages'][0]['rating']);
    }
        //23mel funcs kman lkol el controller's function elly ha test ISA
        public function test4()
        {
            

            $tt1 = new Review;
            $tt2=new ReviewController;
            $res=$this->json('get','api/showReviewsForABook',['bookId'=>'1000000']);

           // $res= $tt2->showReviewsForBook(1000000)->getContent();
            $data = json_decode($res->getContent(),true);
            $this->assertEquals(1000000 , $data['pages'][0]['id']);
            $this->assertEquals('dsds',$data['pages'][0]['body']);
            $this->assertEquals('read' , $data['pages'][0]['shelf_name']);
            $this->assertEquals(5 , $data['pages'][0]['rating']);
        } 
        public function testdeletion()
    {
        $tt1 = new Review;
        $tt3 = new Book;
        $tt3->deletegenre(1000000);
        $tt1->deleteshowReviewOfBook(1000000);
        $tt3->deleteBook(1000000);
        $tt3->deleteauthor(1000000);
        $this->assertTrue(true);

    }
}