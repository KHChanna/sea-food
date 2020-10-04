@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Currency</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Manage Currency</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <form class="m-0 w-100" action="{{ route('currency.update', [$currency->id]) }}" method="post">
                  @csrf

                  @method('PUT')
                    @include('administrator.currency.form')
                
                  </form>
            </div>
        </div>  
      </div>
    </div>
</div>

<script>
     
</script>
@endsection