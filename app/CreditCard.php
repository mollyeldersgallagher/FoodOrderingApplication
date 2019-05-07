<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
  //one to many relationship with customer table
  public function customer() {
      return $this->belongsTo('App\Customer');
  }

  // A credit card can be associated with many orders
  public function orders() {
      return $this->hasMany('App\Order');
  }
}
