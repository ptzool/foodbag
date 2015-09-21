<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eat extends Model {

	public function food()
    {
        return $this->hasOne('App\Models\Food', 'id', 'food_id');
    }

    public function getUnit()
    {
        $unit = "";
        if($this["amount_type"] == "S") {
            $unit = "g";
        } else if($this["amount_type"] == "L") {
            $unit = "ml";
        }
        return $unit;
    }

    public function getCalories()
    {
        return $this->getScaledValue($this->food['calories']);
    }


    private function getScaledValue($value)
    {
        $out = null;

        $size = $this->food["size"];
        if($size <= 0) {
            return null;
        }

        if($this["amount_type"] == "S")
            $out = ( ($this["amount"]/$size)*$value);
        else if($this["amount_type"] == "L")
            $out = ( ($this["amount"]/$size)*$value);
        else
            $out = (($this["amount"]*$this->food["serving_size"])/$size)*$value;

        return $out;
    }
}

