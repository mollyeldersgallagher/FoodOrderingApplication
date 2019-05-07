<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  // options have a one to many relationship with orders
  public function orders()
  {
    return $this->belongsToMany('App\Order')->withPivot('quantity','option')->withTimestamps();
  }
}
