<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'contact_submissions';

  protected $fillable = ['name', 'email', 'subject', 'message'];
}
