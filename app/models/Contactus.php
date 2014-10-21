<?php

class Contactus extends \Eloquent {
    public $table = 'contactus';
	protected $guarded = [];

    public static $rules = [
        'sender_name'   => 'required|min:3',
        'sender_email'  => 'required|email|min:3|max:100',
        'body'          => 'required|max:500'
    ];

    public static $rulesUpdate = [
        'name'          => 'min:3',
        'address'       => 'min:3|max:300',
        'tel'           => 'numeric',
        'mobile'        => 'numeric',
        'email'         => 'email|min:3|max:150',
    ];
}