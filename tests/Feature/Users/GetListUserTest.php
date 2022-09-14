<?php

namespace Tests\Feature\Users;

use App\Models\User;
use http\Env\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
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
        $response = $this->getJson(route('users.index'));

//        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('data', function (AssertableJson $json) {
                $json->where('total', User::count())->etc();//etc la bo qua cac trg mk k has, o day users, total
            })->etc();
        });
    }

    /** @test */
    public function checkBo()
    {
        $this->assertTrue(true);
    }
}
