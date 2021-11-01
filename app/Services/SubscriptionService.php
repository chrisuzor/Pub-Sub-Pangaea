<?php

namespace App\Services;

use App\Models\Subscriber;
use App\Models\Subscriptions;

class SubscriptionService
{

    public function create($topic, $request)
    {
        $subscriber = Subscriber::getUrlId($request->get('url'))->first();

        if(empty($subscriber)){
            $subscriber =   Subscriber::create($request->all());
        }

        $subscription = Subscriptions::where('topic_id', $topic->id)
                                       ->where('subscriber_id', $subscriber->id)->first();
        if(!empty($subscription))
        {
            return false;
        }
        $subscription = new Subscriptions();
        $subscription->topic_id = $topic->id;
        $subscription->subscriber_id = $subscriber->id;
        return $subscription->save();
    }
}
