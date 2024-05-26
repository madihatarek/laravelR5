<?php

namespace App\Traits;

trait uploadFile
{
    //
    public function upload($imageFile,$path){
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/images';
        $imageFile->move($path, $fileName);
        return $fileName;
    }
    
}
