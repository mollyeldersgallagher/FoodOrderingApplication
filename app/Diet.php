<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
  // one to many relationship between foods and diet, each food option has a diet.
  public function foods() {
      return $this->hasMany('App\Food');
  }
}
