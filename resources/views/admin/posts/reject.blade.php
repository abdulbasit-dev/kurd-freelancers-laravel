@extends('adminlte::page')
@extends('adminlte::page')

@section('title', 'Reject Posts')

@section('content_header')
<div class="pl-3">
    <h1 class="">Reject Posts</h1>
</div>
@stop

@section('content')
<div class="bg-white p-3">
    <table class="table" id="table_id">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Creator</th>
                <th scope="col">Create At</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">View Post</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->user->created_at->toDateString()    }}</td>
                <td>

                    <span class="badge badge-pill badge-danger">Rejected</span>

                </td>
                <td class="text-center">
                    <a href="{{ route('posts.show' ,$post) }}" class="text-info h4 ">
                        <i class="fas fa-eye "></i></a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
@stop


@section('js')
<script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });

</script>
@stop
