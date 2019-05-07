<?php

namespace App\Http\Controllers;

class ShoppingBasketItem {
  // Private variables
    private $food;
    private $option;
    private $quantity;

   // constructor passing in food object option object and quantity
    public function  __construct($food, $option, $qty) {
        $this->food = $food;
        $this->option = $option;
        $this->quantity = $qty;
    }

    // Set and Get methods.
    public function getFood() {
      return $this->food;
    }

    public function getOption() {
      return $this->option;
    }

    public function getQuantity() {
       return $this->quantity;
    }

    public function getTotalPrice() {
       return $this->food->cost * $this->quantity;
    }

    public function setQuantity($qty) {
       $this->quantity = $qty;
    }
}
