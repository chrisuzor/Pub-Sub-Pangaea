<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //

    public function index(){
        return Topic::latest()->get();
    }

    public function show(Topic $topic){
        return $topic;
    }

    public function create(Request $request){

    }
}
