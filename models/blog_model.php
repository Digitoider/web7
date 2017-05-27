<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.05.2017
 * Time: 14:44
 */
class Blog_model
{

    public function saveImage($id)
    {
        $dir = "C:/xampp/htdocs/web6/";
        $dest320x240 = "userdata/images/320x240/$id.jpg";
        $destOriginal = $dir . "userdata/images/original/$id.jpg";
        $source = $_FILES['image']['tmp_name'];

        $img = new Imagick($source);

        $img->thumbnailImage(320,0);
        if($img->writeImage($dir . $dest320x240)){//copy($source, $dest);
            copy($source, $destOriginal);
            return $dest320x240;
        }

        return "error";
    }
}