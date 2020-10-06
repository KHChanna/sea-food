@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Report</h4>
        <div class="d-flex d-background">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pull-left mb-0">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Report Sale</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ol>
                </nav>
            </div>
            
          </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table" id="table">
                    <thead>
                      <tr>
                        <th scope="col" width="8%">#</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Code</th>
                        <th scope="col">Sale Date</th>
                        <th scope="col">Paid</th>
                        <th width="10%" scope="col">Total</th>
                        <th width="10%" scope="col">Status</th>
                        <th width="10%" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (@$sales)
                            @foreach ($sales as $key => $sale)
                                <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$sale->invoice_number}}</td>
                                  <td>{{$sale->code}}</td>
                                  <td>{{$sale->sale_date}}</td>
                                  <td>{{$sale->paid_amount}}</td>
                                  <td>{{$sale->total}}</td>
                                  <td>
                                      @if ($sale->payment_status == 1)
                                        <span class="badge badge-success text-white">Paid</span>
                                      @else
                                        <span class="badge badge-warning text-white">Pending</span>
                                      @endif
                                  </td>
                                  <td>
                                      <div class="d-flex justify-content-start">
                                        <a href="{{ route('sale.show', [$sale->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-eye text-white" aria-hidden="true"></i></a>
                                 
                                            {{-- <button data-id="{{$sale->id}}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button> --}}
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Open Balance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group col-12">
            <label for="exampleFormControlFile1">Amout</label>
            <input class="form-control form-control-lg numeric"  id="open-amount" type="text" placeholder="Amount">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="open-balance" >Save</button>
      </div>
    </div>
  </div>
</div>

@if(session()->has('success'))
  <script>
    $(document).ready(function(){
      swal({
        title: "Success",
        text: "Save Successfully!",
        icon: "success",
        button: "Confirm",
      });
    });
  </script>
@endif

  @error('error')
    <script>
        $(document).ready(function(){
          swal({
            title: "Fail",
            text: "Your Have not yet open balance!",
            icon: "error",
            button: "Confirm",
          });
        });
    </script>
@enderror

<script>

      $(document).ready(function() {
        $('#table').DataTable();

        $('.btn-delete').on('click', function() {
              swal({
              title: "Are you sure?",
              text: "",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                let id = ($(this).attr('data-id'));
                let route = "{{ route('sale.destroy', ['id']) }}";
                var token = $("meta[name='csrf-token']").attr("content");
               
                $.ajax({
                  url: route.replace('id', id),
                  type: 'POST',
                  data: {
                      "id": id,
                      "_method":"DELETE",
                      "_token": token,
                  },
                  success: function (){
                    window.location.reload();
                  },
                  error: function(){
                  }
                });
              } 
            });
        });
      });

      $(document).on('click', '#open-balance', function(){
          let balance = $('#open-amount').val();
          var token = $("meta[name='csrf-token']").attr("content");

          if ((balance) <= 0 ) {
            alert('Invalid Amount! Please input amount greater than 1');
            return;
          }

        $.ajax({
          url: "{{route('regisersale.store')}}",
          type: 'POST',
          data: {
              "amount": balance,
              "_method":"POST",
              "_token": token,
          },
          success: function (response){
            console.log(response)
            if(response.status_code == 200)
              window.location.href = response.redirect_url;
          },
          error: function(){
          }
        });
      });
</script>
@endsection