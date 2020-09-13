@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Product Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">Home</li>
                        <li class="breadcrumb-item"> <a href="{{ route('products.index') }}">Products</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <strong>Product Name: </strong>
                        {{$data->name}}
                    </div>
                    <div class="col-md-6">
                        <strong>Product Code: </strong>
                        {{$data->code}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <strong>Category: </strong>
                        {{$data->category['name']}}
                    </div>
                    <div class="col-md-6">
                        <strong>Unit: </strong>
                        {{$data->unit['name']}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <strong>Price: </strong>
                        ${{$data->price}}
                    </div>
                    <div class="col-md-6">
                        <strong>Description:</strong>
                        {{$data->description}}
                    </div>
                </div>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>

        </div>
    </div>
</div>
@endsection