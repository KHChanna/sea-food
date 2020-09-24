@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">All</li>
            <li class="breadcrumb-item"> <a href="#">Category</a></li>
          </ol>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          {{-- add button --}}
          <a class="btn btn-info" href="{{ route('category.create') }}">Add New</a>
          <hr>
          {{-- datatable --}}
          @if ($message = Session::get('success'))

          @endif
          {{-- card --}}
          <div class="card">
            <div class="row">
              <div class="col-sm-12">

                <table class="table table-bordered mb-0">
                  <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th style="width: 250px">Action</th>
                  </thead>

                  <tbody>
                    @foreach ($category as $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->code}}</td>
                      <td>{{$category->description}}</td>
                      <td>
                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                          <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
                          <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
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
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
@endsection