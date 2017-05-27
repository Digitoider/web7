<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 12:59
 */
class Photoalbum_model
{
    public function getPhotosPaths(){
        $pathToImgs = "public/images/";

        for($i = 0; $i < 15; $i++){
            $photosPaths[$i] = $pathToImgs . ($i+1) . ".jpg";
        }

        return $photosPaths;
    }
}