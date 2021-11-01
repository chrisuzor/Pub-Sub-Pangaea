<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    //
    public function test(Request $request){

        Log::info($request->all());
    }

    public function test2(Request $request){

        Log::info($request->all());
    }

    public function test3(Request $request){

        Log::info($request->all());
    }
}
