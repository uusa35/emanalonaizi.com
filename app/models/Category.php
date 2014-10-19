<?php

class Category extends \Eloquent {


	protected $fillable = [];

    public function posts() {
        return $this->belongsToMany('Post', 'category_post', 'post_id');
        // this will return the posts related to this category
    }
}