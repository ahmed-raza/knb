<?php

namespace App\Http;

use Storage;

class CustomHelper {
  public static function getPath($image){
    $image_path = Storage::get('ads/'.$image->ad_id.'/thumb_'.$image->imageName);
    return $image_path;
  }
}
