<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model {

    public $timestamps = false;

    protected $fillable =[
        'drink','amount', 'type_id', 'package_id'
    ];
    public function type() {

        return $this->belongsTo( Type::class );
    }

    public function package() {

        return $this->belongsTo( Package::class );
    }
}
