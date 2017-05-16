<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = [
    'title',
    'city',
    'year',
    'car_make',
    'car_model',
    'car_version',
    'registration_city',
    'mileage',
    'exterior_color',
    'description',
    'price',
    'seller_name',
    'mobile_number'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
