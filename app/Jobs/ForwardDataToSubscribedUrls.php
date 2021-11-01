<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ForwardDataToSubscribedUrls
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $event;
    public function __construct($event)
    {
        //
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $event = $this->event->load('topic.subscribers');
        $subscribers = $event->topic->subscribers;
        foreach ($subscribers as $subscriber){
          $response =  Http::post($subscriber->url, [
                'data' => $this->event->body
            ]);

          if ($response->successful())
          {
              Log::info(" Event Has been subscribed to");
          }else{
              Log::error(" There was an error");
          }
        }
    }
}
