<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   // one to one relationship between user and customer
    public function user(){
      return $this->belongsTo('App\User');
    }
    // each customer can have many credit cards
    public function credit_cards(){
      return $this->hasMany('App\CreditCard');
    }
    //each customer can have many orders
    public function orders(){
      return $this->hasMany('App\Order');
    }
}
