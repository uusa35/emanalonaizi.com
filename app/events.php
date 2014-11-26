<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 10/22/14
 * Time: 9:41 PM
 */
/*
 * Usama Comment
 * this will automatically be loaded
 * */

    // upload new image while creating new post
    Event::listen('post.create','AdminPhotoController@create');
    // updating images within the post
    Event::listen('post.update','AdminPhotoController@update');
    // counter :: only PageViewers to add 1 for each request for a certain post
    Event::listen('post.newHitCounter', 'PostController@newHitCounter');
