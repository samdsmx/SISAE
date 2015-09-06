<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ImageUtil {

    public function getBlurred($url) {
        $image = new Imagick();
        $imagenblob = file_get_contents($url);
        $image->readimageblob($imagenblob);
        $image->blurImage(5, 3);
        return $image;
    }
}
