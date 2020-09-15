@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Categories</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Manage Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                <form class="m-0 w-100" action="{{ route('product.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  @method('PUT')
                    @include('administrator.product.form')
                  </form>
            </div>
        </div>  
      </div>
    </div>
</div>

<script>
      $(document).ready(function(){
        let images = {!! json_encode(@$images)  !!};

        let preloaded = [];
        $.each(images, function(key, value){
          preloaded.push({ 'id' : key, 'src': `{{ asset('/uploads/images/products') }}/${value}` });
        });

        $('.input-images').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });
      });
</script>
@endsection