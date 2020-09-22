<div class="form-group">
  <label for="inputAddress">Name</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Name" value="{{ @$supplier->name ?? '' }}" name="name" required>
</div>


<div class="form-group">
  <label for="inputAddress">Phone</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Phone" value="{{ @$supplier->phone ?? '' }}" name="phone" required>
</div>

<div class="form-group">
  <label for="inputAddress2">Email</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Email" value="{{ @$supplier->email ?? '' }}" name="email" required>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Address</label>
  <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ @$supplier->address ?? '' }} </textarea>
</div>


<div class="col-sm-12">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
  <a href="{{ route('supplier.index') }}" class="btn btn-primary pull-right">Cancel</a> 
</div>