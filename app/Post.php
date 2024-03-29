<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "posts";

    protected $fillable = [
    	'title', 'content'
    ];

    public function author()
    {
    	return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
	{
	    return 'uid';
	}
}
