<?php

class Comment extends \Eloquent {

	protected $fillable = [];


    public static $rules = [
        'title' => 'required|min:5',
        'body'  => 'required|min:5'
    ];
    // notice a comment belongsto ONE POST
    public function post() {
        return $this->belongsTo('Post');
    }

    public function user() {
        return $this->belongsTo('User');
    }
}