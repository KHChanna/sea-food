@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container h-100" style="background-color: #fff">
        <div class="row mt-2">
            <a href="{{route('sale.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="row my-4 p-2 bg-info" >
            <h3>Sale Detail</h3>
        </div>

        <div class="row mb-1">
            <div class="col-sm-2">Invoice Number</div>
            <div class="col-sm-2">: {{$sale->invoice_number}}</div>
            <div class="col-sm-2">Total</div>
            <div class="col-sm-2">: {{$total}} $</div>
        </div>

        <div class="row mb-1">
            <div class="col-sm-2">Code</div>
            <div class="col-sm-2">: {{$sale->code}}</div>
            <div class="col-sm-2">Total Paid</div>
            <div class="col-sm-2">: {{$sale->paid_amount}} $</div>
        </div>

        <div class="row mb-1">
            <div class="col-sm-2">Date</div>
            <div class="col-sm-2">: {{$sale->created_at}}</div>
            <div class="col-sm-2">Payment Type</div>
            <div class="col-sm-2">: {{Payment($sale->payment_type)}}</div>
        </div>

        <div class="row mb-1">
            <div class="col-sm-2">Status</div>
            <div class="col-sm-2">: 
                @if ($sale->payment_status == 1)
                                        <span class="badge badge-success text-white">Paid</span>
                                      @else
                                        <span class="badge badge-warning text-white">Pending</span>
                                      @endif
            </div>
        </div>


        <div class="row mt-5">
            <h4 class="ml-2">Products</h4>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="5%" scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sale_detail as $key => $item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{product($item->product_id) ?? ''}}</td>
                            <td>{{$item->unit->name ?? ''}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}} $</td>
                            <td>{{$item->total}} $</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">Total</td>
                        <td>{{$total}} $</td>
                    </tr>
                </tfoot>
              </table>
        </div>
    </div>
</div>
@endsection