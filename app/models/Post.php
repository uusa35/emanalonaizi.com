<?php

class Post extends \Eloquent {

	protected $fillable = [];



    // relation between Post & Category : a category has many posts + a post belongs to many category
    // pivot relation ManyToMany between Post and category
    public function categories() {
        return $this->belongsToMany('Category','category_post', 'category_id','post_id');
    }


    // hasMany relation : a post has many comments
    public function comments() {
        return $this->hasMany('Comment');
    }

    // hasMany relation : a post has many photos
    public function photos() {
        return $this->hasMany('Photo');
    }
}