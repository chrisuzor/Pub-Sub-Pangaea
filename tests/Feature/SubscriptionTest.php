<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Subscriber;
use App\Models\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function setUp () :void{

        parent::setUp();

        $this->subscriber = Subscriber::factory()->create([
            'url' => 'http://127.0.0.1:8000/api/test'
        ]);
        $this->topic = Topic::factory()->create();
    }

    public function test_subscription()
    {

        $response = $this->post('api/subscribe/'.$this->topic->title, [
            'url' => 'http://127.0.0.1:8000/api/test'
        ]);
        $response->assertStatus(200);
    }
}
