<?php

use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('GJApi.V.1.0.0')->group(function () {
    Route::post('createMember', [MemberController::class, 'store'])->name('createMember');
    Route::get('listeMember', [MemberController::class, 'index'])->name('listeMember');
});