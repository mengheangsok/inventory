<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = ['name','code','price','category_id'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function location()
	{
		return $this->belongsToMany('App\Location');
	}
}


