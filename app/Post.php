<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
    	'title', 
    	'body', 
    	'created_by', 
    	'updated_by',
    ];

    public function user()
    {
		return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
