<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  // mamy to many relationship between orders and foods
  public function foods()
  {
      return $this->belongsToMany('App\Food')->withPivot('quantity','option_id')->withTimestamps();
  }

  // one to many relationship between customer and orders every customer can have many orders
  public function customer()
  {
      return $this->belongsTo('App\Customer');
  }

  public function credit_card()
  {
      return $this->belongsTo('App\CreditCard');
  }


  // function that calculates the total cost of the order
  public function total() {
      $total = 0.0;
      foreach ($this->foods as $food) {
          $total += $food->cost * $food->pivot->quantity;
      }
      return $total;
  }

}
