<?php

namespace App\Http\Controllers\Admin;

//  Calling the Diet model to gain access to the database
//  using model, view controller system
use App\Food;
use App\Diet;
use App\Option;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FoodController extends Controller
{


    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('role:admin');

    }


    public function index()
    {
      //  Retrieving all the food objects from the database
      //  and stores them in the foods array
      $foods = Food::all();

      //  returns the admin food index page with the array of food objects
      return view('admin.foods.index')->with([
        'foods' => $foods,


      ]);
    }

    public function create()
    {
        // retreving all the diet objects to loop though them on the create foods
        // form as it has a one to many relationship with diets.
        $diets = Diet::all();

        // Returns the create view with the array of diets to loop though
        return view('admin.foods.create')->with([
            'diets' => $diets
        ]);
    }

    //  Store function is used to store and save all the input values that were
    //  posted from the create form in the request object.
    public function store(Request $request)
    {
        // Validates the request object with the following validation rules
        $request->validate([
          'name'=>'required|max:100',
          'description'=>'required|max:100',
          'diet_id'=>'required|exists:diets,id',
          'allergies'=>'required|max:100',
          'ingredients'=>'required|max:100',
          'cost'=>'required|numeric|max:100',
          'image'=>'required|file|image'

        ]);

        //  Below we are creating the path and name the image that has been chosen
        //  to be uploaded.
        //
        //  Takes the name of the diet and stores it
        $name = $request->input('name');
        //  Retrieves the file from the request object file input
        $image = $request->file('image');
        //  getClientOriginalExtension retieves the extention on the file uploaded.
        $extension = $image->getClientOriginalExtension();
        //  Setting the file name to the name of the diet option and concatenates the files extention
        $filename = $name . '.' . $extension;
        // stroreAs function is the path in which the file will be saved to which is in the storage
        // folder which we link to the public folder in order to desplay the images on our web application.
        $path = $image->storeAs('images', $filename, 'public');

        // creating a new food object will all the information posted in the request object
        $f = new Food();
        $f->name = $request->input('name');
        $f->description = $request->input('description');
        $f->diet_id = $request->input('diet_id');
        $f->allergies = $request->input('allergies');
        $f->ingredients = $request->input('ingredients');
        $f->cost = $request->input('cost');
        $f->image = $path;
        $f->save();

        return redirect()->route('admin.foods.index');
    }

    public function show($id)
    {
        // retieving food object using the food id if it exists
        $food = Food::findOrFail($id);

        return view('admin.foods.show')->with([
            'food' => $food
        ]);
    }

    public function edit($id)
    {
      //  Retrieving the food object
      $food = Food::findOrFail($id);
      //  Retrieving all the diet objects also due to the one to many realtionship
      $diets = Diet::all();

      //  Returning the edit form along with the object you wish to edit
      //  and an array of diets to loop though
      return view('admin.foods.edit')->with([
          'food' => $food,
          'diets' => $diets
      ]);
    }

    // Request object is passed in as a paramater along with the food id
    // in which we want to update
    public function update(Request $request, $id)
    {
      // validates the request object with the following rules
      //  if the request object does not pass these rules an exception will be thrown.
      //  and error validation is shown
      $request->validate([
        'name'=>'required|max:100',
        'description'=>'required|max:100',
        'diet_id'=>'required|max:100',
        'allergies'=>'required|max:100',
        'ingredients'=>'required|max:100',
        'cost'=>'required|max:100',
        'image'=>'required|file|image'

      ]);

      $name = $request->input('name');
      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $filename = $name . '.' . $extension;
      $path = $image->storeAs('images', $filename, 'public');

      $f = Food::findOrFail($id);
      $f->name = $request->input('name');
      $f->description = $request->input('description');
      $f->diet_id = $request->input('diet_id');
      $f->allergies = $request->input('allergies');
      $f->ingredients = $request->input('ingredients');
      $f->cost = $request->input('cost');
      $f->image = $path;
      $f->save();

      return redirect()->route('admin.foods.index');
    }

    public function destroy(Request $request,$id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}
