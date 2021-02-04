<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
	use Authenticatable, Authorizable;

	protected $table = 'user';
	public $primaryKey = 'id_user';
	public $timestamps = true;

	protected $fillable =[
		'name', 'email', 'password', 
	];

	//'profile_picture', 'password', 'birthday', 'steam_name', 'newsletter', 'status', 'r_date', 'active'

	/* protected $hidden = [
		'password',
	]; */

	//Relations
	public function reviews(){
		return $this->hasMany('App\Review');
	}

	public function applications(){
		return $this->hasMany('App\Application');
	}

	//Navigieren: $reviews = User::find(1)->reviews;
	//$reviews = User::find(1)->reviews->where('id_review', '=', 10001)->first();

	  public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
	}

	//Selects
	/*$users = DB::table(’users’)?>get();$users = DB::table(’users’)?>select(’name’, ’email’)?>get();$users = DB::table(’users’)?>where(’votes’, ’>’, 100)?>get();$john = DB::table(’users’)?>whereIdAndEmail(2, ’john@doe.com’)?>first();
	*/
}
