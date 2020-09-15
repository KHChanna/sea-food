<div class="form-group">
  <label for="inputAddress">Name</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Name" value="{{ @$user->name ?? '' }}" name="name" required>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender"  required>
      <option value="0">Male</option>
      <option value="1">Female</option>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="inputPassword4">User Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="user_type" required>
      <option value="1">Admin</option>
      <option value="0">Normal user</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="inputAddress">Phone</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Phone" value="{{ @$user->phone ?? '' }}" name="phone" required>
</div>

<div class="form-group">
  <label for="inputAddress2">Email</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Email" value="{{ @$user->email ?? '' }}" name="email" required>
</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Password</label>
    <input type="password" class="form-control" id="inputEmail4" placeholder="Password"  name="password" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputPassword4">Comfirm Password</label>
    <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password" name="cf_password" required>
  </div>
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