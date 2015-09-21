<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {

    protected $fillable = ['food_class_id', 'name'];

    public function scopeNames($query)
    {
        return $query->get(array('id','name'));
    }

}
