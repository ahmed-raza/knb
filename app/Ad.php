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
  public function messages() {
    return $this->hasMany('App\Message');
  }

  public static function types(){
      return [
          'SUV'           => 'SUV',
          'Sedan'         => 'Sedan',
          'Minivan'       => 'Minivan',
          'Hatchback'     => 'Hatchback',
          'Convertible'   => 'Convertible',
      ];
  }

  public static function makers(){
      return [
          'Honda'     => 'Honda',
          'Suzuki'    => 'Suzuki',
          'Nissan'    => 'Nissan',
          'Toyota'    => 'Toyota',
          'Daihatsu'  => 'Daihatsu',
      ];
  }

  public static function models(){
      return [
          'Accord'        => 'Accord',
          'Baleno'        => 'Baleno',
          'Bolan'         => 'Bolan',
          'Charade'       => 'Charade',
          'City'          => 'City',
          'Civic'         => 'Civic',
          'Corolla GLi'   => 'Corolla GLi',
          'Corolla XLi'   => 'Corolla XLi',
          'Corona'        => 'Corona',
          'FX'            => 'FX',
          'Hilux'         => 'Hilux',
          'Khayber'       => 'Khayber',
          'Lancer'        => 'Lancer',
          'Mehran'        => 'Mehran',
          'N-One'         => 'N-One',
          'N-Wagon'       => 'N-Wagon',
          'Prado'         => 'Prado',
      ];
  }
}
