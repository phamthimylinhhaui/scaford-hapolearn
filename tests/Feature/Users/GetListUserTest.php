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

//        $response->assertJson(function (AssertableJson $json) {
//            $json->has('data', function (AssertableJson $json) {
//                $json->where('total', User::count())->etc();//etc la bo qua cac trg mk k has, o day users, total
//            })->etc();
//        });
        $response->assertJson(function (AssertableJson $json) {
            $json->has('data') ->etc();
        });
    }

    /** @test */
    public function checkBo()
    {
        $this->assertTrue(true);
        $expected = "Hoang";
        $actual = "Hoang";// minh hoang thi test no fail
        $this->assertEquals($expected, $actual, 'ktra kq mong đợi có bằng kết quả khi chạy k');
        $this->assertEmpty($expected, 'check xem biến này có rỗng không');
    }
}
