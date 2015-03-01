<?php namespace Gocompose\Foodbag\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model {

    protected $fillable = ['date', 'weight'];

    public function scopeLatest($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
