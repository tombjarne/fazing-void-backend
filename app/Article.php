<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
	
	public $primaryKey = 'id_article';
	
	public $timestamps = true;

	protected $fillable =[
		'id_article', 'id_category', 'name_de', 'name_en', 'price', 'release_date', 'description_de', 
		'description_en', 'availability', 'pictures','game_language', 'audio_language', 'video_link',
		'teaser_de', 'teaser_en', 'features_de','features_en', 'age_rating', 'content_rating', 
		'system_requirements', 'c_date', 'active'
	];

	protected $guarded =[
	];
}
