@extends('adminlte::page')
@section('title', 'Team Member')
@section('content_header')
{{-- susscefull alert --}}
@if (Session::has('message'))
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("{{ Session::get('title') }}", "{{ Session::get('message') }}", "success", {
        timer: 1100,
        button: false
      });

</script>
@endif
<div class="d-flex align-items-center">

  <h1>Admin Team Memebr</h1>
  <button class="btn " data-toggle="modal" data-target="#createCityModal">
    <i class="fas fa-plus-circle fa-2x text-primary"></i>
  </button>
</div>

@stop
@section('content')
<div class=" p-3">
  <table class="table" id="table_id">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        @if (auth()->user()->role_id==3)
        <th scope="col" class="">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($teams as $team)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $team->name }}</td>
        <td>{{ $team->role->role_name }}</td>
        @if (auth()->user()->role_id==3)
        <td class="d-flex align-items-center">
          <button class="btn change_role  " data-toggle="modal" data-id="{{ $team->id }}"
            data-target="#modal-{{ $team->id }}">
            <i class="fas fa-crown ml-2 text-white bg-warning p-2 rounded-circle"></i></button>
          <form action="{{ route('teams.destroy',$team->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn ">
              <i
                class="fas fa-trash  ml-2 bg-danger p-2 rounded text-white rounded-circle"></i></button>
          </form>

        </td>

        @endif
      </tr>


      <!-- Update Role Modal -->
      <div class="modal fade" id="modal-{{ $team->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit {{ $team->name }}
                Role
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="{{ route('teams.update', $team->id) }}" method="POST"
                id="tag-update-form-{{ $team->id }}">
                @csrf
                @method("PUT")
                <div>
                  <label for="name">Role Name</label>
                  <select class="custom-select" name="role">

                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if ($role->
                      id==$team->role->id) selected
                      @endif>{{ $role->role_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary"
                data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-success"
                onclick="document.getElementById('tag-update-form-{{ $team->id }}').submit()">Update</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Add new Admin Modal -->
<div class="modal fade" id="createCityModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add New Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ route('teams.store') }}" method="POST" id="city-form">
          @csrf

          <div>
            <label for="name">Name</label>
            <input type="text" required class="form-control" name="name" id="name">
          </div>
          <div>
            <label for="name">Email</label>
            <input type="email" required class="form-control" name="email" id="email">
          </div>
          <div>
            <label for="name">Password</label>
            <input type="password" required class="form-control" name="password" id="name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" form='form' class="btn btn-outline-primary"
          onclick="document.getElementById('city-form').submit()">Create</button>
      </div>
    </div>
  </div>
</div>


@stop
@section('css')
{{-- <link rel="stylesheet"
   href="/css/admin_custom.css"> --}}
@stop
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready(function() {
      $('#table_id').DataTable();

    });

    $('.change_role').on('click',function(){
        const id = $(this).data('id');
        console.log(id);


    })

</script>
@stop