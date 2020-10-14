@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container pt-3">
        <h4 class="">Manage Currency</h4>
        <div class="d-flex d-background">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pull-left mb-0">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Manage Currency</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ol>
                </nav>
            </div>
            <div class="ml-auto p-2 ">
                <a href="{{ route('currency.create') }}"  class="btn btn-primary pull-right" >New Currency</a>
                {{-- <a href="{{ route('category.create') }}" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalCenter">New User</a> --}}
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
                        <th scope="col">Dollar</th>
                        <th scope="col">Riel</th>
                        <th scope="col">Created</th>
                        <th width="10%" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (@$currency)
                            @foreach ($currency as $key => $value)
                                <tr>
                                  <td>{{++$key}}</td>
                                  <td>{{$value->dollar}}</td>
                                  <td>{{$value->riel}}</td>
                                  <td>{{$value->created_at}}</td>
                                  <td>
                                      <div class="d-flex justify-content-start">
                                        <a href="{{ route('currency.edit', [$value->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-edit text-white"></i></a>
                                        {{-- <form action="{{ route('user.destroy', [$user->id]) }}" method="post" style="width: 0px !important; margin:0 !important; ">
                                            @csrf
                                            @method('DELETE') --}}
                                          <button data-id="{{$value->id}}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
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
                let route = "{{ route('currency.destroy', ['id']) }}";
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
@endsection