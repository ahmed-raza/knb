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
  public static function ownerOrAdmin($entityType, $entity){
    switch ($entityType) {
      case 'ad':
        if ((Auth::check() && Auth::user()->id === $entity->user->id) || (Auth::check() && Auth::user()->rank === 'admin')) {
          return true;
        }
        break;
      case 'user':
        if ((Auth::check() && Auth::user()->id === $entity->id) || (Auth::check() && Auth::user()->rank === 'admin')) {
          return true;
        }
        break;
    }
    return false;
  }
}
