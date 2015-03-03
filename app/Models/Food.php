<?php namespace Gocompose\Foodbag\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {

	//

    public function scopeNames($query)
    {
        return $query->get(array('id','name'));
    }

}
