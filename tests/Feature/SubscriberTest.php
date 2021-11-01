<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriberTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp () :void{

        parent::setUp();

        $this->subscriber = Subscriber::factory()->create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_subscribers()
    {
        $response = $this->get('api/subscribers');

        $response->assertStatus(200);
    }

    public function test_get_a_subscriber(){
        $response = $this->get('api/subscribers/'.$this->subscriber->id);
        $response->assertStatus(200);
    }
}
