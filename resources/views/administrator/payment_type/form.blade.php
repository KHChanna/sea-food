<div class="form-group">
  <label for="inputAddress">Name</label>
  <input type="text" class="form-control" placeholder="name" value="{{ @$paymentTypes->name ?? '' }}" name="name" required>
</div>

<div class="form-group">
  <label for="inputAddress">Description</label>
  <textarea name="description" placeholder="description" class="form-control" id="" cols="10" rows="4">{{@$paymentTypes->description ?? ''}}</textarea>
</div>

{{-- <div class="form-group">
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="gridCheck">
  <label class="form-check-label" for="gridCheck">
    Check me out
  </label>
</div>
</div> --}}

<div class="col-sm-12">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
  <a href="{{ route('user.index') }}" class="btn btn-secondary pull-right text-white">Cancel</a> 
</div>