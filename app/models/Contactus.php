<?php

class Contactus extends \Eloquent {
    public $table = 'contactus';
	protected $fillable = [];

    public static $rules = [
        'sender_name'  => 'required|min:3',
        'sender_email' => 'required|email|min:3|max:100',
        'body'      => 'required|max:500'
    ];
}