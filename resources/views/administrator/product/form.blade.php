@php
    $cateogries = category();   
@endphp

<div class="form-group">
  <label for="inputAddress">Category</label>
  {{ Form::select('category_id', category(), @$product->category_id ?? [], ['placeholder' => 'Please Pick Category ...', 'class' => 'form-control select2', 'required']) }}
</div>

{{-- <div class="form-group">
  <label for="inputAddress">Unit</label>
  {{ Form::select('parent_id', units(), [], ['placeholder' => 'Please Pick Unit ...','class' => 'form-control select2', 'required']) }}
</div> --}}

<div class="form-group">
  <label for="inputAddress">Code</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Code" value="{{ @$product->code ?? '' }}" name="code" required>
</div>

<div class="form-group">
  <label for="inputAddress2">Name</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Name" value="{{ @$product->name ?? '' }}" name="name" required>
</div>

<div class="form-group">
  <label for="inputAddress2">Price</label>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Unit</th>
        <th>Quantity</th>
        <th>Price</th>
        <th><a  class="btn btn-sm btn-light" id="addMore"><i class="fa fa-plus" style="color: black"></i></a></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if (@$product_units)
            @foreach ($product_units as $key => $item)
                <tr>
                  <td class="pt-3">{{ $key + 1 }}</td>
                  <td>{{ Form::select('unit_id[]', units(), $item->unit_id, ['placeholder' => 'Please Pick Unit ...','class' => 'form-control select2', 'required']) }}</td>
                  <td><input type="text" class="form-control" value="{{ $item->qty_per_unit }}" name="qty[]" readonly></td>
                  <td><input type="number" class="form-control " value="{{ $item->price }}" name="price[]"></td>
                  <td class="pt-3"><a class="btn btn-sm btn-light"><i class="fa fa-minus"></i></a></td>
                </tr>
            @endforeach
        @else
          <td class="pt-3">1</td>
          <td>{{ Form::select('unit_id[]', units(), [], ['placeholder' => 'Please Pick Unit ...','class' => 'form-control select2', 'required']) }}</td>
          <td><input type="text" class="form-control" value="1" name="qty[]" readonly></td>
          <td><input type="number" class="form-control " name="price[]"></td>
          <td class="pt-3"><a class="btn btn-sm btn-light"><i class="fa fa-minus"></i></a></td>
        @endif
      </tr>
    </tbody>
  </table>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ @$product->description ?? '' }} </textarea>
</div>

<div class="form-group">
  <label for="colFormLabelLg" class="col-form-label col-form-label-lg text-right">Image</label>
      <div class="input-images"></div>
</div>

<div class="col-sm-12">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
  <a href="{{ route('supplier.index') }}" class="btn btn-primary pull-right">Cancel</a> 
</div>