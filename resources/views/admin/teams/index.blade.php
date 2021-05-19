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
<h1>Admin Team Memebr</h1>

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
                <th scope="col">Chnage Role</th>
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
                <td>
                    <button class="btn btn-info change_role " data-toggle="modal"
                        data-id="{{ $team->id }}" data-target="#modal-{{ $team->id }}">Change Role
                        <i class="fas fa-crown ml-2"></i></button>
                </td>

                @endif
            </tr>
            <!-- Update tag Modal -->
            <div class="modal fade" id="modal-{{ $team->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit {{ $team->name }}
                                Role
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
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
