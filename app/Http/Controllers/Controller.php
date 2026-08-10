<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ApiLoginRequest;
use App\Traits\ApiResponse;

abstract class Controller
{
    // use ApiResponse;
    // public function login(ApiLoginRequest $request){
    //     return $this->ok($request -> get("email"));
    // }

    // public function register(ApiLoginRequest $request){
    //     return $this->ok($request -> get("email"));
    // }
}
