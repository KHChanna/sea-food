@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Units</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">Home</li>
                        <li class="breadcrumb-item"> <a href="#">Units</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                <a class="btn btn-info" href="{{ route('units.create') }}">Add New</a>
                    <hr>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 250px">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($units as $unit)
                                    <tr>
                                        <td>{{$unit->id}}</td>
                                        <td>{{$unit->name}}</td>
                                        <td>{{$unit->description}}</td>
                                        <td>
                                        <form action="{{ route('units.destroy',$unit->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('units.show',$unit->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('units.edit',$unit->id) }}">Edit</a>
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
@endsection