@extends('layouts.app')
  
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
@endsection