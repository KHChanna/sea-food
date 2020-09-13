@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">Home</li>
                        <li class="breadcrumb-item"> <a href="#">Products</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
            
                <div class="col-sm-12">
                    <a class="btn btn-info" href="{{ route('products.create') }}">Add New</a>
                    <hr>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table" class="table mb-0 p-5">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th style="width: 250px">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->units}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
</script>
@endsection