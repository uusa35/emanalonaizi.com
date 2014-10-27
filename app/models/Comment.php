<?php

class Comment extends \Eloquent {

	protected $fillable = ['title','body','post_id','user_id'];


    public static $rules = [
        'title' => 'required|min:5|max:100',
        'body'  => 'required|min:5|max:300'
    ];
    // notice a comment belongsto ONE POST
    public function post() {
        return $this->belongsTo('Post');
    }

    public function user() {
        return $this->belongsTo('User','user_id','id');
    }
}