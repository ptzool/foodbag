<?php namespace Gocompose\Foodbag\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

    public function type()
    {
        return $this->hasOne('Gocompose\Foodbag\Models\ActivityType', 'id', 'activity_type_id');
    }

    public function getMetRateValue($weight)
    {

        $met = $this->type['met_rate'];
        $duration = $this['duration'];

        //Imperial MET calculation
        $weight = $weight*2.20462262; //$weight = $weight*KGtoLB;
        $cal = (($met*3.5*$weight)/200)*$duration;

        return $cal;
    }

}
