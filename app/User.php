<?php namespace Gocompose\Foodbag;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Carbon\Carbon;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function weights()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Weight')
            ->orderBy('date','desc');
    }

    public function eats()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Eat');
    }

    public function activities()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Activity');
    }

    public function foods()
    {
        return $this->belongsToMany('Gocompose\Foodbag\Models\Food', 'eats', 'user_id', 'food_id')
            ->withPivot("eaten", "amount", "amount_type", "approved");

    }

    public function eatsToday()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Eat')
            ->where('eaten', '>=', Carbon::today() )
            ->orderBy('eaten', 'desc');
    }

    public function eatsWeek()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Eat')
            ->where('eaten', '>=', Carbon::today() )
            ->orderBy('eaten', 'desc');
    }

    public function activitiesToday()
    {
        return $this->hasMany('Gocompose\Foodbag\Models\Activity')
            ->where('activity_date', '>=', Carbon::today() )
            ->orderBy('activity_date', 'desc');
    }

}
