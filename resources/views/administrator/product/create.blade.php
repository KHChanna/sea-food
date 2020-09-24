@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Categories</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Manage Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
          </ol>
        </nav>
       

    </div>

    <div class="container mt-2 p-3 mb-5" style="background-color: #fff">
      <div class="row">
        <p class="text-danger">All field that contain * are required.</p>
      </div>

      <div class="row mt-2">
        <div class="col-12">
            <div style="width: 60%" class="mx-auto">
                <form class="m-0 w-100" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    @include('administrator.product.form')
                
                  </form>
            </div>
        </div>  
      </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        $('.input-images').imageUploader();

        $('#addMore').on('click', function(){
          $(this).hide();
          let rowCount = $('tbody tr').length;
          if (rowCount > 1)
            return;

          let rowElement = `
                <tr>
                  <td class="pt-3">1</td>
                  <td>{{ Form::select('unit_id[]', childUnits(), [], ['placeholder' => 'Please Pick Unit ...','class' => 'form-control select2', 'required']) }}</td>
                  <td><input type="text" class="form-control" name="qty[]"></td>
                  <td><input type="number" class="form-control " name="price[]"></td>
                  <td class="pt-3"><a class="btn btn-sm btn-danger remove-unit"><i class="fa fa-minus text-white"></i></a></td>
                </tr>
          `;

          $('table tbody').append(rowElement);
          $('.select2').select2();
        });

    });

    $(document).delegate('.remove-unit', 'click',function(){
      $(this).closest('tr').remove();
      $('#addMore').show();
    })
</script>
@endsection