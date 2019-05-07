<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Diet;

class PageController extends Controller
{
  public function __construct()
  {
  }
    public function welcome(Request $request){
        //  Retrieving all Options, Diets and Basket content
        $options = Option::all();
        $diets = Diet::all();
        $basket = ShoppingBasket::getBasket($request);

      return view('welcome')->with([
        'options' => $options,
        'diets' => $diets,
        'basket' => $basket
      ]);
    }

    // Returning about view
    public function about(){
      return view('about');
    }

    // Returning contactus view
    public function contactus(){
      return view('contactus');
    }
}
