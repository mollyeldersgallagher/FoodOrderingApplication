<!-- Edit and Create form, this checks the food variable and if it has no value it is a new
food item and if it has a value you are editing and existing food item -->

@if ($food == null)
<form method="POST" action="{{ route($role . '.foods.store' )}}" enctype="multipart/form-data">
@else
<form method="POST" action="{{ route($role . '.foods.update', $food->id )}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
@endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Food Name</label>
            @if ($food == null)
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
            @else
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" />
            @endif
            <!-- prints errors from errors array if an error occurs -->
            <p class="text-danger">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</p>
        </div>
        <div class="form-group col-md-8">
            <label for="description">Description</label>
            @if ($food == null)
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
            @else
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $food->description) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('description')) ? $errors->first('description') : "" }}</p>
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
          <label for="diet">Diet</label>
          <select id="diet" class="form-control" name="diet_id">
            <!-- loops through the diet objects and prints the name option in a select -->
              @foreach ($diets as $diet)
                  @if ($food == null)
                  <option value="{{ $diet->id }}" {{ (old('diet_id') == $diet->id) ? "selected" : "" }} >{{ $diet->name }}</option>
                  @else
                  <option value="{{ $diet->id }}" {{ (old('diet_id', $food->diet_id) == $diet->id) ? "selected" : "" }} >{{ $diet->name }}</option>
                  @endif
              @endforeach
          </select>
          <p class="text-danger">{{ ($errors->has('diet_id')) ? $errors->first('diet_id') : "" }}</p>
      </div>
        <div class="form-group col-md-4">
            <label for="cost">Cost</label>
            @if ($food == null)
            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
            @else
            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost', $food->cost) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('cost')) ? $errors->first('cost') : "" }}</p>
        </div>
        <div class="form-group col-md-4">
            <label for="allergies">Allergies</label>
            @if ($food == null)
            <input type="text" class="form-control" id="allergies" name="allergies" value="{{ old('allergies') }}" />
            @else
            <input type="text" class="form-control" id="allergies" name="allergies" value="{{ old('allergies', $food->allergies) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('allergies')) ? $errors->first('allergies') : "" }}</p>
        </div>
        <div class="form-group col-md-4">
            <label for="ingredients">Ingredients</label>
            @if ($food == null)
            <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') }}" />
            @else
            <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients', $food->ingredients) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('ingredients')) ? $errors->first('ingredients') : "" }}</p>
        </div>
        <div class="form-row">
             <div class="col-md-12">
                 <div class="d-flex flex-row flex-wrap">
                     @if ($food != null)
                     <div class="flex-grow-0 flex-shrink-0 p-2">
                         <img src="{{ asset('storage/' . $food->image) }}" />
                     </div>
                     @endif
                     <!-- <div class="flex-grow-1 flex-shrink-1"> -->
                         <label>Image</label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="input" id="image" name="image">
                             </div>
                         </div>
                         <p class="text-danger">{{ ($errors->has('image')) ? $errors->first('image') : "" }}</p>
                     </div>
             </div>
         </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary" value="Store">Submit</button>
        </div>
    </div>
</form>
