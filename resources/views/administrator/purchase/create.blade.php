@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container h-100" style="background-color: #fff">
      <div class="row my-4 p-2">
        <form class="m-0 w-100" action="{{ route('purchase.store') }}" method="post">
            @csrf
            @method('POST')
            @include('administrator.purchase.form')
          </form>
      </div>
    </div>
</div>

<script>
    function getProduct(){
        $.ajax({
            url: '{!! route("purchase.get-Cart") !!}',
            method: "get",
            dataType: 'json',
            success: function (response) {
              console.log(response);
              let tr ='';
              let select = '';
              let total_as_riel = 0;
              let total_as_dollar = 0;
              let currency =  {!! json_encode(currency()) !!}; 

              $.each(response, function(key, value) {
                  total_as_dollar += parseFloat(value.total);
                  total_as_riel = total_as_dollar * currency.riel;

                  $.each(value.unit_name, function(k, v){
                      select += `<option value="${k}" selected>${v}</option>`
                  });

                  tr += `
                          <tr>
                              <td scope="row" id="${value.id}">${key}</td>
                              <td>${value.name}<input type="hidden" name="id[]" value="${value.id}"/></td>
                              <td><input class="form-control qty calculate numeric" type="text" name="qty[]" value="${value.qty}"/></td>
                              <td>
                                  <select name="unit[]" class="select2 form-control" style="width:100%">
                                    ${select}
                                  </select>
                              </td>
                              <td><input  class="form-control number calculate" type="text" name="cost[]" value="${value.cost}" readonly/></td>
                              <td><input class="form-control" type="text" name="total[]" value="${value.total}"/ readonly></td>
                              <td class="text-center">
                              <a class="btn btn-xs btn-danger rm-cart" id="${value.id}"><i class="fa fa-minus text-white" style="color:red; font-size:17px;"></i></a>
                              </td>
                            </tr>
                        `;
              });
              $('tbody').html(tr);
              $('select').select2();
              $('#total_as_dollar').val((total_as_dollar).toFixed(2));
              $('#total_as_riel').val(total_as_riel.toFixed(2));

              $(".numeric").on("keypress keyup blur",function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
          if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
          }
      });
            }
        });
    }

    $(document).ready(function(){
        getProduct();
    });

    $(document).on('click', '.my-card', function(){
      var id = $(this).attr('id');
      $.ajax({
          url: "{{ url('admin/purchase/add-cart') }}" + '/' + id,
          method: "get",
          dataType: 'json',
          success: function (response) {
              if(response.message == 'warning'){
                  console.log(response);
                //   alert(response.data);
              }else{
                getProduct();
              }
          }
      });
    });

    $(document).on('click', '.rm-cart', function(){
      var id = $(this).attr('id');
      $.ajax({
          url: '{!! url("admin/purchase-remove-product/'+id+'") !!}',
          method: "get",
          dataType: 'json',
          success: function (response) {
              if(response.message == 'warning'){
                  showWarningToast(response.data);
              }else{
                  getProduct();
                //   alert(response.data);
              }
          }
      });
    });

    $(document).on('click', '#remove-all-product',function () {
            $.ajax({
                url: '{!! route("purchase.remove-all-Cart") !!}',
                method: "POST",
                data:{
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function (response) {
                    if(response.message == 'success'){
                        getProduct();
                        // alert(response.data)

                        // showSuccessToast(response.data);
                    }
                }
            });
        });


  $(document).on('keyup', '#paid_as_dollar',function () {
      let total_us = $('#total_as_dollar').val();

      let remaining_us  = $(this).val() > 0 ? Math.abs($(this).val() - total_us) : 0;

      $('#pay_back_as_dollar').val(remaining_us);
      $('#pay_back_as_riel').val(remaining_us * 4100);
  });

  $(document).on('keyup', '#paid_as_riel',function () {
      let total_us = $('#total_as_riel').val();
      // let remaining_us  = ($(this).val() - total_us) > 0 ? 0 : Math.abs($(this).val() - total_us);
      let remaining_us  = $(this).val() > 0 ? Math.abs($(this).val() - total_us) : 0;

      $('#pay_back_as_riel').val(remaining_us);
      $('#pay_back_as_dollar').val((remaining_us / 4100).toFixed(2));
  });


  $(document).on('blur', '.qty',function () {
    updateProduct($(this));
  });

    function updateProduct(e){
            var id = $(e).closest('tr').find('input[name="id[]"]').val();
            var qty = $(e).closest('tr').find('input[name="qty[]"]').val();
            var unit = $(e).closest('tr').find('select[name="unit[]"]').val();
            var cost = $(e).closest('tr').find('input[name="cost[]"]').val();
            // var cur = $(e).closest('tr').find('select[name="currencies[]"]').val();
            // var dis = $(e).closest('tr').find('input[name="off[]"]').val();
            var total = cost*qty;
            // var purchase_total_dis = $('#purchase_total_dis').val();
            // var qtyUnit = $(e).closest('tr').find('select[name="unit[]"]').find('option:selected').attr('qtyUnit');
            $.ajax({
                url: '{!! url("admin/purchase-update-product/'+id+'") !!}',
                method: "post",
                data:{
                    _token: '{{ csrf_token() }}',
                    qty: qty,
                    unit: unit,
                    cost: cost,
                    // dis: dis,
                    total: total,
                    // cur: cur,
                    // qty_unit: qtyUnit,
                    // purchase_total_/dis: purchase_total_dis
                },
                dataType: 'json',
                success: function (response) {
                    if(response.message == 'warning'){
                        showWarningToast(response.data);
                    }else{
                        getProduct();
                    }
                }
            });
    }
    
    $(document).on('blur', '#purchase_total_dis', function() {
        getProduct();

        setTimeout(function(){ 
            let total_us = $('#total_as_dollar').val();
            var total = parseFloat(total_us) - ( ( parseFloat(total_us) * parseFloat($('#purchase_total_dis').val()) ) / 100);
            let currency =  {!! json_encode(currency()) !!}; 
            console.log(total);

            $('#total_as_dollar').val(total.toFixed(2));
            $('#total_as_riel').val( (total * currency.riel).toFixed(2) );
         }, 500);
        
    });
</script>
@endsection