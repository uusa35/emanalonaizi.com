<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 10/22/14
 * Time: 8:56 PM
 */

namespace Lib\Validators;


class PhotoValidator {
    public function PhotoExtentionValidator ($images) {
        foreach($images as $image) {
            echo'<pre>';
            /*dd($image);*/
            $fileType = $image->getMimeType();
            if(!in_array($fileType,['image'])) {

             return false;
            }
        }


        return true;
    }
} 