<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(ApiLoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return $this->error('No Credential Match', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok(
            'Authenicated',
            [
                'token' => $user->createToken('authToken', ['*'], now()->addHours(24))->plainTextToken,
            ]
        );
    }


    public function register(ApiLoginRequest $request){

        return $this->ok("Register Success");
    }


    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return $this->ok("Logout Success");
    }
}
