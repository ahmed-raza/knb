<?php

namespace App\Http;

use Storage;
use Auth;

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
  public static function owner($ad){
    if (Auth::check() && Auth::user()->id === $ad->user->id) {
      return true;
    }
    return false;
  }
}
