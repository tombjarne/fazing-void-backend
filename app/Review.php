<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Review extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
	use Authenticatable, Authorizable;

	protected $table = 'review';
	public $primaryKey = 'id_review';
	public $timestamps = true;

	protected $fillable =[
		'id_review', 'id_user', 'id_article', 'rating', 'review', 'language', 'c_date', 'active'
	];

	protected $hidden = [

	];

	public function user() {
		return $this?>belongsTo(’App\User’);
	}

	public function article() {
		return $this?>belongsTo(’App\Article’);
	}

	  public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
	}
}