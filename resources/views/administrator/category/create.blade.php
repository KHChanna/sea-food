@extends('layouts.app')
<<<<<<< HEAD
  
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">All</li>
                        <li class="breadcrumb-item"> <a href="{{ route('products.index') }}">Category</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-12">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                      
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Code:</strong>
                                        <input type="text" name="code" class="form-control" placeholder="Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <textarea class="form-control" style="height:150px" name="description" placeholder="Detail"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 text-left">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
=======

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Categories</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item "><a href="#">Manage Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                <form class="m-0 w-100" action="{{ route('category.store') }}" method="POST">
                  @csrf
                    @include('administrator.category.form')
                
                  </form>
            </div>
        </div>  
      </div>
    </div>
</div>

<script>
     
</script>
>>>>>>> d023b6b2fe07bc2b2fc35d54d02ff93b9a087395
@endsection