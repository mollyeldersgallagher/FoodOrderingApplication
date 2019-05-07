<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//  Calling the Diet model to gain access to the database
//  using model, view controller system
use App\Diet;
use App\Http\Controllers\Controller;

//  Controller is a series of functions that can return a view or
//  a series of variables.
class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //  Index function called when on the index page.
    public function index()
    {
      //  Using the model to gain access to the diets
      //  table and retrieving all the diets
      $diets = Diet::all();

      //  Return the admin.diets.index view with an array of the diet
      //  objects retrieved from the database
      return view('admin.diets.index')->with([
          'diets' => $diets

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // When the create function is called it returns the create
     // view that contains a form
    public function create()
    {
          return view('admin.diets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Store function is used to store and save all the input values that were
    //  posted from the create form.
    public function store(Request $request)
    {
      // Validates the request object with the following validation rules
      $request->validate([
        'name'=>'required|max:100',
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

      //  Creating a new diet object
      $d = new Diet();
      $d->name = $request->input('name');
      $d->image = $path;
      //  If no errors occur the new diet object will be saved to the database
      //  And will be redirected back to the index page.
      $d->save();

      return redirect()->route('admin.diets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      //  Passes the id of the diet to the database and if the id exists
      //  the diet objecctis stored in diet variable if not it fails.
      $diet = Diet::findOrFail($id);

      //  returns the show.blade page with the diet object
      return view('admin.diets.show')->with([
          'diet' => $diet
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  Passes the id of the diet to the database and if the id exists
      //  the diet objecctis stored in diet variable if not it fails.
      $diet = Diet::findOrFail($id);

      //  returns the edit.blade page with the diet object
      return view('admin.diets.edit')->with([
          'diet' => $diet
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Request object is passed in as a paramater along with the diet id
     // in which we want to update
    public function update(Request $request, $id)
    {
      // validates the request object with the following rules
      //  if the request object does not pass these rules an exception will be thrown.
      $request->validate([
        'name'=>'required|max:100',
        'image'=>'required|file|image'

      ]);

        $name = $request->input('name');
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = $image->storeAs('images', $filename, 'public');

        $d = Diet::findOrFail($id);
        $d->name = $request->input('name');
        $d->image = $path;
        $d->save();

      return redirect()->route('admin.diets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Finds the diet with the id passed into the function or fails.
      $diet = Diet::findOrFail($id);
      // if the diet exists delete it and redirect the user.
      $diet->delete();
      return redirect()->route('admin.diets.index');
    }
}
