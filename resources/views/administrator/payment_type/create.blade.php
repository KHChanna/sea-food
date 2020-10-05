@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Payment Type</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Manage Payment Type</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payment Type</li>
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
                <form class="m-0 w-100" action="{{ route('payment-type.store') }}" method="POST">
                  @csrf
                    @include('administrator.payment_type.form')
                  </form>
            </div>
        </div>  
      </div>
    </div>
</div>

<script>
     
</script>
@endsection