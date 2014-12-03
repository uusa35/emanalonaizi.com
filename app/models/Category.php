<?php

class Category extends \Eloquent {


	protected $guarded = [];

    public static $categoryRulesUpdate = [
        'name' => 'required|min:4|max:100',
        'category_description' => 'min:2|max:350'
    ];

    public function posts() {
        return $this->belongsToMany('Post', 'category_post');
        // this will return the posts related to this category
    }
}