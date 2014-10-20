<?php

class Aboutus extends \Eloquent {
    public $table = 'aboutus';
	protected $guarded = [];
    public static $updateRules = [
        'title' => 'required|min:2|max:350',
        'body'  => 'required|min:2'
    ];

}