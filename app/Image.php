<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  public function ads() {
    return $this->belongsToMany('App\Ad');
  }
}
