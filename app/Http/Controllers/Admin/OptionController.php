<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Option;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $options = Option::all();

       return view('admin.options.index')->with([
          'options' => $options

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required|max:100',
        'cost'=>'required|max:100',
        'image'=>'required|file|image'

      ]);

      $name = $request->input('name');
      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $filename = $name . '.' . $extension;
      $path = $image->storeAs('images', $filename, 'public');

      $o = new Option();
      $o->name = $request->input('name');
      $o->cost = $request->input('cost');
      $o->image = $path;
      $o->save();

      return redirect()->route('admin.options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $option = Option::findOrFail($id);

      return view('admin.options.show')->with([
          'option' => $option
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
      $option = Option::findOrFail($id);

      return view('admin.options.edit')->with([
          'option' => $option
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name'=>'required|max:100',
        'cost'=>'required|max:100',
        'image'=>'required|file|image'

      ]);

        $name = $request->input('name');
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = $image->storeAs('images', $filename, 'public');

        $o = Option::findOrFail($id);
        $o->name = $request->input('name');
        $o->cost = $request->input('cost');
        $o->image = $path;
        $o->save();

      return redirect()->route('admin.options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $option = Option::findOrFail($id);
      $option->delete();
      return redirect()->route('admin.options.index');
    }
}
