<?php

namespace App\Http;

use Storage;

class CustomHelper {
  public static function getPath($image, $type){
    switch ($type) {
      case 'thumb':
        $image_path = Storage::get('ads/'.$image->ad_id.'/thumb_'.$image->imageName);
        return $image_path;
        break;
      
      default:
        $image_path = Storage::get('ads/'.$image->ad_id.'/'.$image->imageName);
        return $image_path;
        break;
    }
  }
}
