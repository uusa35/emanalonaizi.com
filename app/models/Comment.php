<?php

class Comment extends \Eloquent {

	protected $fillable = [];


    // notice a comment belongsto ONE POST
    public function post() {
        return $this->belongsTo('Post');
    }

    public function user() {
        return $this->belongsTo('User');
    }
}