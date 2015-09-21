<?php namespace App;

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
        return $this->hasMany('App\Models\Weight')
            ->orderBy('date','desc');
    }

    public function eats()
    {
        return $this->hasMany('App\Models\Eat');
    }

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Models\Food', 'eats', 'user_id', 'food_id')
            ->withPivot("eaten", "amount", "amount_type", "approved");

    }

    public function eatsToday()
    {
        return $this->hasMany('App\Models\Eat')
            ->where('eaten', '>=', Carbon::today() )
            ->orderBy('eaten', 'desc');
    }

    public function eatsWeek()
    {
        return $this->hasMany('App\Models\Eat')
            ->where('eaten', '>=', Carbon::today() )
            ->orderBy('eaten', 'desc');
    }

    public function activitiesToday()
    {
        return $this->hasMany('App\Models\Activity')
            ->where('activity_date', '>=', Carbon::today() )
            ->orderBy('activity_date', 'desc');
    }

    public function activitiesRange($start, $limit)
    {
        return $this->hasMany('App\Models\Activity')
            //->where('activity_date', '>=', Carbon::today())
            ->orderBy('activity_date', 'desc')
            ->offset($start)
            ->limit($limit);
    }

}
