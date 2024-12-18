<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Http\Resources\Drink as DrinkResource;

class DrinkController extends ResponseController {
    public function getDrinks() {
        $drinks = Drink::with( "type", "package" )->get();
        return $this->sendResponse( DrinkResource::collection( $drinks ), "Betöltve" );
        }

    public function getDrink($id)  {
        $drink = Drink::find( (int)$id );
        if (!$drink) 
           { return response()->json(['error'=>'Drink not found'],404); }
        return $this->sendResponse( new DrinkResource( $drink ),"betöltve");
    }

    public function getDrinkName( Request $request ) {
        $drink = Drink::where( "drink", $request[ "drink" ])->first();
        return $this->sendResponse( new DrinkResource( $drink ), "Betöltve" );
    }

    public function newDrink( Request $request ) {
        $validated =$request->validate([
                "drink" => "required",
                "amount" => "required",
                "type_id" => "required",
                "package_id" => "required"
            ]);
        $drink = new Drink();
        $drink -> drink= $validated['drink'];
        $drink -> amount= $validated['amount'];
        $drink -> type_id= $validated['type_id'];
        $drink -> package_id= $validated['package_id'];
        $drink->save();
        return ($drink);
    }

    public function updateDrink( Request $request, $id ) {
        // $validated =$request->validate([
        //     "drink" => "required",
        //     "amount" => "required",
        //     "type_id" => "required",
        //     "package_id" => "required"
        // ]);
        // if (!$drink) 
        // { 
        //     return response()->json(['error'=>'Drink not found'],404);        
        // }

        $drink = Drink::find($id);
        $validated =$request->validate([
            "drink" => "required|string",
            "amount" => "required|integer",
            "type_id" => "required|integer",
            "package_id" => "required|integer"
        ]);
 
        $drink -> drink= $validated['drink'];
        $drink -> amount= $validated['amount'];
        $drink -> type_id= $validated['type_id'];
        $drink -> package_id= $validated['package_id'];

        $drink->save();
        return $drink;
    }

    public function destroyDrink( $id ) {

        $drink = Drink::find( $id );
        $drink->delete();
        return $drink;
    }
}
