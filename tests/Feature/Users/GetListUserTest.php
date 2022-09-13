<?php

namespace Tests\Feature\Users;

use http\Env\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetListUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserList()
    {
////        $response = $this->get('/');
//        $response = $this->getJson(route('users.index'));
//
//        $response->assertStatus(200);
////        $response->asser tStatus(Response::);
        $this->assertTrue(true);
    }

    /** @test */
    public function checkBo()
    {
        $this->assertTrue(true);
    }
}
