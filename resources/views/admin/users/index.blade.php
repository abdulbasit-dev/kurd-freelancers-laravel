@extends('adminlte::page')
@section('title', 'Users')
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
<h1>All Users</h1>

@stop
@section('content')
<div class=" p-3">
  <table class="table" id="table_id">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col" class="text-center">Has Profile</th>
        <th scope="col" class="text-center">View Profile</th>
        @if (auth()->user()->role_id!=2)
        <th>Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <th class="text-center">@if ($user->profile)
          <i class="far fa-check-circle text-success fa-2x"></i>
          @else
          <i class="far fa-times-circle text-danger fa-2x"></i>
          @endif

        </th>
        <td class="text-center">
          <a href="@if ($user->profile)
                        {{ route('users.show' ,$user) }}
                    @else
                    javascript:void(0)
                    @endif" class="text-info h4 ">
            <i class="fas fa-eye "></i></a>
        </td>
        @if (auth()->user()->role_id!=2)
        <td>
          <form action="{{ route('users.destroy',$user) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger ">Delete
              <i class="fas fa-trash ml-2"></i></button>
          </form>
        </td>
        @endif
      </tr>

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
</script>
@stop