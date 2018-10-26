<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ArticleTest extends TestCase
{


    public function setUp() {
        parent::setUp();
        $this->user = factory(User::class)->state('admin')->create();

        $this->simple = factory(User::class)->create();
    }

    public function tearDown() {
        $this->user->delete();
        $this->simple->delete();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testPost() {
        $response = $this->actingAs($this->user)
                         ->post('/articles', ['title' => 'testingart',
                                                    'contents' => 'helloworld']);
        $response->assertSuccessful();

        $simresponse = $this->actingAs($this->simple)
                         ->post('/articles', ['title' => 'testingsimple',
                                              'contents' => 'hello world']);
        $simresponse->assertForbidden();
    }
}
