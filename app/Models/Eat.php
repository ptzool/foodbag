<?php namespace Gocompose\Foodbag\Models;

use Illuminate\Database\Eloquent\Model;

class Eat extends Model {

	public function food()
    {
        return $this->hasOne('Gocompose\Foodbag\Models\Food', 'id', 'food_id');
    }

}
