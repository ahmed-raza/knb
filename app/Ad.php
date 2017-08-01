<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = [
    'title',
    'car_make',
    'car_model',
    'car_year',
    'car_mileage',
    'car_color',
    'car_type',
    'car_price',
    'description',
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
  public function images() {
    return $this->hasMany('App\Image');
  }
}
