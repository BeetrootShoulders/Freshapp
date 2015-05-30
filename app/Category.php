<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	// Set this if timestamps have been removed from the table
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function recipes()
	{
		
		return $this->hasMany('App\Recipe');
	
	}

}
