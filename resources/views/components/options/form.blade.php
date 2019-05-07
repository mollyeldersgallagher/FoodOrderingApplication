@if ($option == null)
<form method="POST" action="{{ route($role . '.options.store' )}}" enctype="multipart/form-data">
@else
<form method="POST" action="{{ route($role . '.options.update', $option->id )}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
@endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">name</label>
            @if ($option == null)
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
            @else
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $option->name) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</p>
        </div>
        <div class="form-group col-md-6">
            <label for="name">cost</label>
            @if ($option == null)
            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
            @else
            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost', $option->cost) }}" />
            @endif
            <p class="text-danger">{{ ($errors->has('cost')) ? $errors->first('cost') : "" }}</p>
        </div>

    </div>
    <div class="form-row">
         <div class="col-md-12">
             <div class="d-flex flex-row flex-wrap">
                 @if ($option != null)
                 <div class="flex-grow-0 flex-shrink-0 p-2">
                     <img src="{{ asset('images/' . $option->image) }}" />
                 </div>
                 @endif
                 <div class="flex-grow-1 flex-shrink-1">
                     <label>Image</label>
                     <div class="input-group">
                         <div class="custom-file">
                             <input type="file"  id="image" name="image">
                             <label  for="image">Choose file</label>
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
