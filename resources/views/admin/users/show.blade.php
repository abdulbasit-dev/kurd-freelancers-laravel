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
<div class=" p-3">
    <div class="container emp-profile ">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img" style="width: 300px;height:150px">
                        @if ($user->profile->profile_picture)
                        <img src="{{ asset($user->profile->profile_picture) }}"
                            alt="{{ $user->profile->name }}">

                        @else
                        <img src="https://as2.ftcdn.net/jpg/03/32/59/65/500_F_332596535_lAdLhf6KzbW6PWXBWeIFTovTii1drkbT.jpg"
                            alt="no image">

                        @endif


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <h6>
                            Web Developer and Designer
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                    href="#home" role="tab" aria-controls="home"
                                    aria-selected="true">User Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab"
                                    href="#profile" role="tab" aria-controls="profile"
                                    aria-selected="false">About User</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br />
                        <a href="">Bootsnipp Profile</a><br />
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>

                        @foreach ($user->profile->skillArray($user->profile->skills) as $skill)
                        <a href="">{{ $skill }}</a><br />

                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->profile->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->profile->phone_number }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->profile->city->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->profile->gender->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Language</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->profile->language->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <p class="text-dark">{{ $user->profile->about_me }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@stop
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

</script>
@stop
