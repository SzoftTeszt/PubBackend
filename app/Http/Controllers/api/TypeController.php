<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Type as TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    public function getType(){
        $types = Type::all();
        return TypeResource::collection($types);
    }
}
