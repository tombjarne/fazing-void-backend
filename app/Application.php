<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Application extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
	use Authenticatable, Authorizable;

	protected $table = 'application';
	public $primaryKey = 'id_application';
	public $timestamps = true;

	protected $fillable =[
		'id_application', 'id_user', 'id_article', 'message', 'a_date', 'active'
	];

	protected $hidden = [

	];

	public function user() {
		return $this?>belongsTo(’App\User’);
	}

	public function article() {
		return $this?>belongsTo(’App\Article’);
	}

	  public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
	}
}