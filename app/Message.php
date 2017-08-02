<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['ad_id','user_id','name','phone','message'];
  public function ad(){
    return $this->belongsTo('App\Ad');
  }
}
