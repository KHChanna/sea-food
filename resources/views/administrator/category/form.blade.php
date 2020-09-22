@php
    $cateogries = category();   
@endphp

<div class="form-group">
  <label for="inputAddress">Parent</label>
  {{ Form::select('parent_id', category(), [], ['class' => 'form-control select2']) }}
  {{-- <select class="form-control select2" name="parent_id">
      @if ($categories)
          @foreach ($categories as $item)
              <option value="{{$item->id}}">{{}}</option>
          @endforeach
      @endif
  </select> --}}
</div>


<div class="form-group">
  <label for="inputAddress">Code</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Code" value="{{ @$category->code ?? '' }}" name="code" required>
</div>

<div class="form-group">
  <label for="inputAddress2">Name</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Name" value="{{ @$category->name ?? '' }}" name="name" required>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ @$category->description ?? '' }} </textarea>
</div>


<div class="col-sm-12">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
  <a href="{{ route('supplier.index') }}" class="btn btn-primary pull-right">Cancel</a> 
</div>