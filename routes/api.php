<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;
use App\Http\Controllers\api\TypeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get( "/drinks", [ DrinkController::class, "getDrinks" ]);
Route::get( "/drink", [ DrinkController::class, "getDrinkName" ]);
Route::get( "/drink/{id}", [ DrinkController::class, "getDrink" ]);
Route::post( "/newdrink", [ DrinkController::class, "newDrink" ]);
Route::put( "/updatedrink/{id}", [ DrinkController::class, "updateDrink" ]);
Route::delete( "/deletedrink/{id}", [ DrinkController::class, "destroyDrink" ]);
Route::get( "/type", [ TypeController::class, "getType" ]);
// Route::post( "/type", [ TypeController::class, "getType" ]);
// Route::put( "/type/{id}", [ TypeController::class, "getType" ]);
// Route::delete( "/type/{id}", [ TypeController::class, "getType" ]);
