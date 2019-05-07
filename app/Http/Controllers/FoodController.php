<?php

namespace App\Http\Controllers;

//  Calling the Diet model to gain access to the database
//  using model, view controller system
use App\Food;
use App\Diet;
use App\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

    public function index(Request $request)
    {
      //  Retrieving all the food objects from the database
      //  and stores them in the foods array
      $foods = Food::all();

      // weve made the getBasket function public in the shopping basket class so we can access
      // it on multiple view pages
      $basket = ShoppingBasket::getBasket($request);

      // return index with foods and basket content
      return view('foods.index')->with([
        'foods' => $foods,
        'basket' => $basket
      ]);
    }

    // Diet function used to filter through dietry requirements
    public function diet(Request $request){

      $request->validate([
        'diet_id'=>'required|exists:diets,id',
        'option_id'=>'required|exists:options,id'
      ]);

      //retrievs option and diet id
      $option_id = $request->input('option_id');
      $diet_id = $request->input('diet_id');

      // using the diet id we retrieve all the food filling options by diet id
      $foods = Food::where('diet_id', $diet_id)->get();
      // we also retrieve the diet information
      $diet = Diet::where('id', $diet_id)->first();
      // Retrieve option object from the database
      $option = Option::findOrFail($option_id);

      // retrieving the basket
      $basket = ShoppingBasket::getBasket($request);
      // returns food.indexs with the following variables and foods array
      return view('foods.index')->with([
        'foods' => $foods,
        'diet' => $diet,
        'option' => $option,
        'basket' => $basket

      ]);
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);

        return view('food.show')->with([
            'food' => $food
        ]);
    }
}
