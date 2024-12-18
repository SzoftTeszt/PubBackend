<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Drink extends JsonResource
{

   
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "drink" => $this->drink,
            "amount" => $this->amount,
            "type_id" => $this->type_id,
            "type" => $this->type->type,
            "package_id" => $this->package_id,
            "package" => $this->package->package,
        ];
    }
}
