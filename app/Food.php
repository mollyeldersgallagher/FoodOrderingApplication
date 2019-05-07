<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // many to many relationship between foods and orders, involes a pivot table food_order with
    // two extra columns quantity and option_id
    public function orders()
    {
      return $this->belongsToMany('App\Order')->withPivot('quantity','option_id')->withTimestamps();
    }

    // one to many relationship with diet every food option has one diet 
    public function diet() {
        return $this->belongsTo('App\Diet');
    }
}
