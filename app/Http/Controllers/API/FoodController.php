<?php

namespace App\Http\Controllers\API;

use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;
use App\Food;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

  public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('role:admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $foods = Food::all();

       return $foods;
    }

    public function type($type){

      $foods = Food::where('type', $type)->get();

      return $foods, $type;
    }

        //

    // public function create()
    // {
    //     return view('admin.foods.create');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = array();

      $data['name']= $request->input('name');
      $data['description']= $request->input('description');
      $data['diet_id']= $request->input('diet_id');
      $data['allergies']= $request->input('allergies');
      $data['ingredients']= $request->input('ingredients');
      $data['cost']= $request->input('cost');
      $data['image']= $request->file('image');


        $rules = [
          'name'=>'required|max:100',
          'description'=>'required|max:100',
          'diet_id'=>'required|exists:diets,id',
          'allergies'=>'required|max:100',
          'ingredients'=>'required|max:100',
          'cost'=>'required|double|max:100'

        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
                  return $data;
              }

        $f = new Food();
        $f->name = $request->input('name');
        $f->description = $request->input('description');
        $f->diet_id = $request->input('diet_id');
        $f->allergies = $request->input('allergies');
        $f->ingredients = $request->input('ingredients');
        $f->cost = $request->input('cost');
        $f->image = $request->input('image');
        $f->save();

        return $f;
        //return redirect()->route('admin.foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $food = Food::findOrFail($id);

        return $food;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = array();

      $data['name']= $request->input('name');
      $data['description']= $request->input('description');
      $data['diet_id']= $request->input('diet_id');
      $data['allergies']= $request->input('allergies');
      $data['ingredients']= $request->input('ingredients');
      $data['cost']= $request->input('cost');
      $data['image']= $request->file('image');

      $rules = [
        'name'=>'required|max:100',
        'description'=>'required|max:100',
        'diet_id'=>'required|exists:diets,id',
        'allergies'=>'required|max:100',
        'ingredients'=>'required|max:100',
        'cost'=>'required|double|max:100'
      ];

      $validator = Validator::make($data, $rules);

      $f = Food::findOrFail($id);
      $f->name = $request->input('name');
      $f->description = $request->input('description');
      $f->type = $request->input('type');
      $f->allergies = $request->input('allergies');
      $f->ingredients = $request->input('ingredients');
      $f->cost = $request->input('cost');
      $f->image = $request->file('image');
      $f->save();

      return $f;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        // return redirect()->route('admin.foods.index');
        return null;
    }
}
