@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<<<<<<< HEAD
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
=======
    <div class="container pt-3">
        <h4 class="">Manage Categories</h4>
        <div class="d-flex d-background">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pull-left mb-0">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Manage Categories</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ol>
                </nav>
            </div>
            <div class="ml-auto p-2 ">
                <a href="{{ route('category.create') }}"  class="btn btn-primary pull-right" >New Category</a>
            </div>
          </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table" id="table">
                    <thead>
                      <tr>
                        <th scope="col" width="8%">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col">description</th>
                        <th width="10%" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (@$categories)
                            @foreach ($categories as $key => $category)
                                <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$category->code}}</td>
                                  <td>{{$category->name}}</td>
                                  <td>{{$category->parent}}</td>
                                  <td>{{$category->description}}</td>
                                  <td>
                                      <div class="d-flex justify-content-start">
                                        <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-edit text-white"></i></a>
                                        {{-- <form action="{{ route('user.destroy', [$supplier->id]) }}" method="post" style="width: 0px !important; margin:0 !important; ">
                                            @csrf
                                            @method('DELETE') --}}
                                            <button data-id="{{$category->id}}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                                        {{-- </form> --}}
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready(function() {
        $('#table').DataTable();

        $('.btn-delete').on('click', function() {
              swal({
              title: "Are you sure?",
              text: "",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                let id = ($(this).attr('data-id'));
                let route = "{{ route('supplier.destroy', ['id']) }}";
                var token = $("meta[name='csrf-token']").attr("content");
               
                $.ajax({
                  url: route.replace('id', id),
                  type: 'POST',
                  data: {
                      "id": id,
                      "_method":"DELETE",
                      "_token": token,
                  },
                  success: function (){
                    window.location.reload();
                  },
                  error: function(){
                  }
                });
              } 
            });
        });
      });
</script>
>>>>>>> d023b6b2fe07bc2b2fc35d54d02ff93b9a087395
@endsection