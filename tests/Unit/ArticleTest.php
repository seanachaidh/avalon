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
                         ->json('POST', '/articles', ['title' => 'testing_article',
                                                    'contents' => 'helloworld']);
        $response->assertSuccessful();

        $simresponse = $this->actingAs($this->simple)
                         ->json('POST', '/articles', ['title' => 'testing_article',
                                              'contents' => 'hello world']);
        $simresponse->assertForbidden();

        //Delete both resources
        $savedobj = Article::where('title', 'testing_article')->get();

        foreach ($savedobj as $obj) {
            $response = $this->actingAs($this->user)
                ->delete('/articles/' . $obj->id);
            $response->assertSuccessful();
            $this->assertDatabaseMissing('articles', $obj);
        }



    }
}
