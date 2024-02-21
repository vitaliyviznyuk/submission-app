<?php

use App\Jobs\SaveSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/submit', function (Request $request) {
    try {
        SaveSubmission::dispatch($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:10000',
        ]));

        return response()->json(['message' => 'OK']);
    } catch (Throwable $exception) {
        return response()->json(['message' => $exception->getMessage()], 400);
    }
});
