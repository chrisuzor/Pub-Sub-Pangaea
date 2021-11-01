<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function index(){
        return Subscriber::latest()->get();
    }

    public function show(Subscriber $subscriber){
        return $subscriber;
    }
}
