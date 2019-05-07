<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingBasket {

  // made this function public to be accessed easialy for displaying
  // our basket on multiple pages
  public static function getBasket(Request $request) {

      $basket = $request->session()->get('basket', null);
      if ($basket == null) {
          $basket = new ShoppingBasket();
          $request->session()->put('basket', $basket);
      }
      return $basket;
  }

    private $items;

    // constructor, defining items as an array
    public function __construct() {
        $this->items = array();
    }

    // Get fuction to get all items
    public function getItems() {
      return $this->items;
    }

    // Function that calculates total price
    public function getTotalPrice() {
        $total = 0.0;
        // loops through items and adds each price of the singular items to total
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }

    // add function takes paramaters of a food object, option object and quantity
    public function add($food, $option, $qty) {
        // ive concatenated the food id and option id to create an index
        $index = $food->id . '-' . $option->id;
        // below isset checks to see if the item with this certain index is already set in our array
        // if its already set it replaces the old quantity with the new quantity
        if (isset($this->items[$index]) ) {
            $item = $this->items[$index];
            $oldQuantity = $item->getQuantity();
            // calculating and setting new quantity
            $item->setQuantity($oldQuantity + $qty);
        }
        else {
            // if the item is not set in the array aready create a new shopping basket object
            $item = new ShoppingBasketItem($food, $option, $qty);
            $this->items[$index] = $item;
        }
    }

    // update function takes paramaters of a food object, option object and quantity
    public function update($food, $option, $qty) {
        $index = $food->id . '-' . $option->id;
        if (isset($this->items[$index])) {
          // checking to see if the quatity is grater then 0
            if ($qty > 0) {
                $item = $this->items[$index];
                // setting quantity
                $item->setQuantity($qty);
            }
            else if ($qty == 0) {
              // if its equal to 0 is unsetting the item in the array
                $this->item[$index] = NULL;
                unset($this->items[$index]);
            }
        }
        else {
            throw new Exception("Illegal request.");
        }
    }

    public function isEmpty() {
        // empty items array
        return empty($this->items);
    }

    public function removeAll() {
        $this->items = array();
    }
}
