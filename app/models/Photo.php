<?php

class Photo extends \Eloquent {

	protected $fillable = ['photo_id','path'];


    // relation PolyMorph
    public function post() {
        return $this->belongsTo('Post');
    }
}