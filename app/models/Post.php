<?php

class Post extends \Eloquent {

	protected $fillable = [];



    // relation between Post & Blog
    // pivot relation ManyToMany between Post and category
    public function categories() {
        return $this->belongsToMany('Post','category_post', 'category_id','post_id');
    }
}