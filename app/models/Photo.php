<?php

class Photo extends \Eloquent {

	protected $fillable = ['photo_id','path'];

    public static $uploadRules = [
        'image' => 'image'
    ];
    // relation PolyMorph
    public function post() {
        return $this->belongsTo('Post');
    }
}