<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use App\Models\Subscriptions;
use App\Models\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function setUp () :void{

        parent::setUp();


        $this->topic = Topic::factory()->create();
        $this->topic2 = Topic::factory()->create();

        $this->subscriber = Subscriber::factory()->create([
            'url' => 'http://pubsub-main.test/api/test'
        ]);
        $this->secondSubscriber = Subscriber::factory()->create([
            'url' => 'http://pubsub-main.test/api/test2'
        ]);
        $this->thirdSubscriber = Subscriber::factory()->create([
            'url' => 'http://pubsub-main.test/api/test3'
        ]);



    }

    public function test_publish()
    {
        Subscriptions::factory()->create([
            'topic_id' => $this->topic->id,
            'subscriber_id' => $this->subscriber->id
        ]);
        Subscriptions::factory()->create([
            'topic_id' => $this->topic->id,
            'subscriber_id' => $this->secondSubscriber->id
        ]);
        Subscriptions::factory()->create([
            'topic_id' => $this->topic2->id,
            'subscriber_id' => $this->thirdSubscriber->id
        ]);
        $response = $this->postJson('api/publish/'.$this->topic->title,
         ['message' => 'hello']);
        $response->assertStatus(200);
    }
}
