<?php

namespace Tests\Unit;
use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Booktest extends TestCase
{
    public function createtest()
    {
        $tt3 = new Book;
        $tt3->setAuthor(1000000,'a7med7amdy');
        $tt3->setBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,'jyj',1000000,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->setgenre(1000000,1000000,'action');
        $this->assertTrue(true);

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample1()
    {
        $res=$this->json('get','api/Books/book_Authorname',['Author_name'=>'a7med7amdy']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }
    public function testExample2()
    {
        $res=$this->json('get','api/Books/book_ISBN',['ISBN'=>'1']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals('a7med7amdy' , $data['pages'][0]['author_name']);
    }
    public function testExample3()
    {
        $res=$this->json('get','api/Books/book_title',['title'=>'ppp']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('action' , $data['pages'][0]['genre']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }
    public function testExample4()
    {
        $res=$this->json('get','api/books/genre',['genreName'=>'action']);
        $data = json_decode($res->getContent(),true);
        $this->assertEquals('a7med7amdy' , $data['pages'][0]['author_name']);
        $this->assertEquals('ppp',$data['pages'][0]['title']);
        $this->assertEquals(1 , $data['pages'][0]['isbn']);
    }
    public function deletetest()
    {
        $tt3 = new Book;
        $tt3->deletegenre(1000000,2,1000000,'dsds',0,5,4,4,'2019-03-21 00:00:00','2019-03-21 00:00:00');
        $tt3->deleteBook(1000000,'ppp',1,'dsds','2019-03-21 00:00:00','fgdg','dfgdg','fdgd',4,5,9,'jyj',4,8,'2019-03-21 00:00:00','2019-03-21 00:00:00');
       $tt3->deleteauthor(1000000);
        $this->assertTrue(true);

    }
}
