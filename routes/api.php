<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


Route::prefix('v1')->group(base_path('routes/api_v1.php'));

Route::post("/login", [AuthController::class, "login"]);

Route::post("/register", [AuthController::class, "register"]);




// Route::get("/", function(){
//     return response() -> json([
//         "status"=> "success",
//     ], 200);
// });


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
