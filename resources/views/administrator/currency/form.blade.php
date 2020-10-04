<div class="form-group">
  <label for="inputAddress">Dollar</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="1" value="{{ @$currency->dollar ?? 1 }}" name="dollar" readonly required>
</div>

<div class="form-group">
  <label for="inputAddress">Riels</label>
  <input type="text" class="form-control numeric" placeholder="0.00" value="{{ @$currency->riel ?? '' }}" name="riel" required>
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