<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ad_id', 'imageName', 'imagePath',
  ];
  public function ads() {
    return $this->belongsTo('App\Ad');
  }
}
