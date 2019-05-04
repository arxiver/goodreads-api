<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Faker\Factory ;
use App;
class notifications extends TestCase
{
    private $user1;
    private $user2;
    private $token1;
    private $token2;
    private $faker;
    /**
     * set up test
     * @group nour
     * @return void
     */
    public function test1()
    {
        $this->faker = \Faker\Factory::create();
        factory(App\User::class,1)->create();
        $this->user1 = App\User::orderBy('id','desc')->first();
        factory(App\User::class,1)->create();
        $this->user2 = App\User::orderBy('id','desc')->first();
        $this->assertTrue(true);
    }

    /**
     * 
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
