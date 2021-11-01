<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionRequest;
use App\Models\Subscriber;
use App\Models\Subscriptions;
use App\Models\Topic;
use App\Services\SubscriptionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SubscriptionsController extends Controller
{
    //

    public function create(Topic $topic, CreateSubscriptionRequest $request,
                            SubscriptionService $service){


       $subscription = $service->create($topic, $request);

        if($subscription){
            return response()->json(['url' => $request->url, 'topic' => $topic->title]);
        }

        return response()->json(['message' => 'Subscription Failed'], 400);
    }
}
