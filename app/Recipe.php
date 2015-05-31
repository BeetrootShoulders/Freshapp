<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {

	protected $fillable = [
		'recipe_name',
		'ingredients',
		'method',
		'template',
		'recipe_made',
		'category_id'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function category()
	{
		
		return $this->belongsTo('App\Category');
	
	}

	public function getOwnerEmail()
	{
		return $this->user->email;
	}
}
