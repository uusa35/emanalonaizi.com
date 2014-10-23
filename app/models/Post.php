<?php

class Post extends \Eloquent {

	protected $guarded = [];
    public static $postRulesUpload = [
        'title'     => 'required|min:3|max:250',
        'body'      => 'required|min:5',
        'image'     => 'required|min:1|max:5',
        'category'  => 'required'
    ];



    // relation between Post & Category : a category has many posts + a post belongs to many category
    // pivot relation ManyToMany between Post and category
    public function categories() {
        return $this->belongsToMany('Category','category_post');
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