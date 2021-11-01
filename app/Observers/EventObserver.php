<?php

namespace App\Observers;

use App\Jobs\ForwardDataToSubscribedUrls;
use App\Models\Event;

class EventObserver
{
    /**
     * Handle the Event "creating" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        //
        ForwardDataToSubscribedUrls::dispatch($event);
    }


}
