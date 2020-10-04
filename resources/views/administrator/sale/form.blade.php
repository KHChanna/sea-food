<div class="row">
  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="padding-right: 12px;">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3" style="padding: 3px;">
              <input type="text" id="myInput" class="form-control" name="search" placeholder="Search" autocomplete="off">
          </div>
          @if(@$products && count($products) > 0)
              @foreach ($products as $product)
              <div class="row mx-2 my-card" id="{{ $product->id }}">
                <div class="col-sm-4">
                    {{-- https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg --}}
                  <div class="card" style="width: 12rem;"> 
                    <img src="{{ $product->image ? asset('uploads/images/products/' . $product->image->image ) : 'https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg' }}" class="img-thumbnail" >
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}</h5>
                    </div>
                  </div>
                </div>
            </div>
              @endforeach
          @endif
      </div>
  </div>

  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="background: #8080800d; margin-top: 4px;">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 300px; background: white">
              <div class="form-group">
                  <table class="table table-bordered">
                      <thead style="background: #17c3c2; color: white; text-align: center;">
                          <tr style="height:50px;">
                              <td width="3%" scope="col">#</td>
                              <td scope="col">Name</td>
                              <td width="12%">QTY</td>
                              <td width="15%">Unit</td>
                              <td width="18%">Price</td>
                              <td width="15%">Total</td>
                              <td width="10%"><i class="fas fa-cog"></i></td>
                          </tr>
                      </thead>
                      <tbody id="data">

                      </tbody>
                  </table>
              </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <br>
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់សរុបគិតជា:</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                              </div>
                              <input id="total_as_dollar" type="text" class="form-control" value="0" readonly name="total_as_dollar">
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់សរុបគិតជា</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">៛</span>
                              </div>
                              <input id="total_as_riel" type="text" class="form-control" value="0" readonly name="total_as_riel">
                          </div>
                      </div>
                  </div>
                  <hr>

                  
                  <hr>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់បង់ជា:</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                              </div>
                              <input id="paid_as_dollar" name="paid_as_dollar" type="text" class="form-control number"  placeholder="US" value="0">
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់បង់ជា</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">៛</span>
                              </div>
                              <input id="paid_as_riel" name="paid_as_riel" type="text" class="form-control number-only" placeholder="Riel" value="0">
                          </div>
                      </div>
                  </div>
                  <hr>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់ត្រឡប់មកវិញ:</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                              </div>
                              <input id="pay_back_as_dollar" name="pay_back_as_dollar" type="text" class="form-control" value="0" placeholder="" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>ប្រាក់ត្រឡប់មកវិញ</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">៛</span>
                              </div>
                              <input id="pay_back_as_riel" type="text" class="form-control" value="0  " placeholder="" readonly>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <br>
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label>បញ្ចុះតំលៃសរុប(%):</label>
                          <input type="text" id="purchase_total_dis" value="0" name="purchase_total_dis" class="form-control numeric discount" maxlength="3" placeholder="Total Discount" maxlength="3">
                          @if($errors->has('purchase_total_dis'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{!! $errors->first('purchase_total_dis') !!}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  
                  <hr>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label class="required">អ្នកផ្គត់ផ្គង់</label>
                          {!! Form::select('supplier', supplier(), @$productUnit ? $productUnit->unit_id:'', ['placeholder' => 'Pick Supplier','class' => 'form-control select2', 'style' => 'width: 100%']) !!}
                      </div>
                  </div>

                  <hr>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label class="required">លេខវិក័យបត្រ័</label>
                        <input type="text" name="invoice" class="form-control" value="{{$invoice_number}}" required autocomplete="off" readonly>
                          @if($errors->has('invoice'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{!! $errors->first('invoice') !!}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="required">Code</label>
                      <input type="text" name="code" class="form-control" value="" required autocomplete="off" >
                        @if($errors->has('invoice'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{!! $errors->first('invoice') !!}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label class="required">ប្រភេទទូទាត់ប្រាក់</label>
                          {!! Form::select('payment_type', PaymentType() , [], ['placeholder' => 'Pick Payment','class' => 'form-control select2', 'style' => 'width: 100%' , 'id' => 'payment_type', 'required']) !!}
                          @if($errors->has('payment_type'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{!! $errors->first('payment_type') !!}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <hr>

                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label id="next_payment" class="required">ថ្ងៃបង់បន្ទាប់</label>
                          <input type="date" name="next_payment" class="form-control" value="{{ old('next_payment') }}" id="datepicker-popup" placeholder="Next Payment" required autocomplete="off">
                          @if($errors->has('next_payment'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{!! $errors->first('next_payment') !!}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <br>
                      <div class="form-group">
                              <button class="btn btn-info"> Pay</button>
                              <a class="btn btn-danger text-white" id="remove-all-product" > Remove All</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

