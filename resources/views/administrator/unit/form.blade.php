<div class="form-group">
  <label for="inputAddress">Parent</label>
  {{ Form::select('parent_id', @$unit ? units($unit->id) : units() , @$unit->parent_id ?? '' , ['class' => 'form-control select2', 'placeholder' => 'Pick Parent ...']) }}
</div>

<div class="form-group">
  <label for="inputAddress2">Name</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Name" value="{{ @$unit->name ?? '' }}" name="name" required>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ @$unit->description ?? '' }} </textarea>
</div>


<div class="col-sm-12">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
  <a href="{{ route('supplier.index') }}" class="btn btn-primary pull-right">Cancel</a> 
</div>