@extends('adminlte::page')
@section('title', 'User Profile')
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
@stop
@section('content')
<div class="container">
    <div class="row">
        <!-- Post content-->
        <div class="col-lg-8">
            <!-- Title-->
            <h1 class="mt-4">{{ $post->title }}</h1>
            <!-- Author-->
            <p class="lead">
                by
                <a href="{{ route('users.show' , $post->user->id) }}">{{ $post->user->name }}</a>
            </p>
            <hr />
            <!-- Date and time-->
            <p>Posted on {{ $post->created_at->toDayDateTimeString() }}
                <hr />
                <!-- Preview image-->
                <img class="img-fluid rounded w-100" style="height:310px"
                    src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                    alt="..." />
                <hr />
                <!-- Post content-->
                <p class="lead">{{ $post->description }}</p>

                <hr />



        </div>

        <div class="col-md-4">
            <!-- post detail-->
            <div class="card my-4">
                <h5 class="card-header">Post Details</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li class="text-primary">Post Id</li>
                                <li class="text-primary">Location</li>
                                <li class="text-primary">Required Skill</li>
                                <li class="text-primary">Deadlin</li>
                                <li class="text-primary">Price</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>{{ $post->id }}</li>
                                <li>Erbil</li>
                                <li>BackEnd, Front-End</li>
                                <li>{{ $post->deadline }}</li>
                                <li>300$</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            {{-- post status --}}
            <div class="card my-4">
                <h5 class="card-header">Post Status</h5>
                <div class="card-body">
                    @if ($post->reject)
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li class="text-primary">Status</li>
                                <li class="text-primary mt-3">Reject Resone</li>

                            </ul>
                        </div>
                        <div class="col-lg-6 ">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                </li>
                                <li class="mt-3">
                                    {{ $post->reject_resone }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li class="text-primary">Status</li>

                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li> @if ($post->status)
                                    <span class="badge badge-pill badge-success">Published</span>

                                    @else
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                    @endif</li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- only for publisher --}}
            @if (auth()->user()->role_id==2)

            {{-- only if post is pending  --}}
            @if (!$post->status && !$post->reject)
            <!-- post action-->
            <div class="card my-4">
                <h5 class="card-header">Post Action</h5>
                <div class="card-body">
                    <form action="{{ route('posts.update',$post) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label>Accept Or Reject</label>
                        <select class="custom-select post_action" name="post_action">
                            <option value="accept">Accept</option>
                            <option value="reject">Reject</option>

                        </select>

                        <div class="form-group reject d-none mt-3">
                            <label for="reject_resone">Reject Resone</label>
                            <input type="text" class="form-control" name="reject_resone">
                        </div>

                        <button type="submit"
                            class="btn btn-block btn-outline-primary my-3">Submit</button>
                    </form>
                </div>
            </div>

            @endif
            @endif


        </div>
    </div>
</div>


@stop
@section('css')

@stop
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $( ".post_action" ).change(function() {
  if( $(this).val()=='reject'){
    $('.reject').removeClass('d-none')
  }
});
</script>
@stop
