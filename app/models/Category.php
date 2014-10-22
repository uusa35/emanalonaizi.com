<?php

class Category extends \Eloquent {


	protected $guarded = [];

    public function posts() {
        return $this->belongsToMany('Post', 'category_post');
        // this will return the posts related to this category
    }
}