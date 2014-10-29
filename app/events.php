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


    Event::listen('post.create','AdminPhotoController@create');
    Event::listen('post.update','AdminPhotoController@update');
