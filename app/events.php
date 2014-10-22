<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 10/22/14
 * Time: 9:41 PM
 */
/*
 * Admin Events
 * */

if(Auth::user()->username === 'admin') {
    Event::listen('post.create','AdminPhotoController@create');
}