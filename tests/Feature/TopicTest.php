<?php

namespace Tests\Feature;

use App\Models\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TopicTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp () :void{

        parent::setUp();

        $this->topic = Topic::factory()->create();
    }

     /**  @test  */
    public function getTopicsTest()
    {
        $response = $this->get('api/topics');

        $response->assertStatus(200);
    }
}
