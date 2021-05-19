@extends('adminlte::page')
@section('title', 'Tags')
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
  <h1>Tags</h1>
  <div class="mt-2 d-flex  align-items-center">
    <h3 class="">Add New Tag</h3>
    <button class="btn "
      data-toggle="modal"
      data-target="#createTagModal">
      <i class="fas fa-plus-circle fa-2x text-primary"></i>
    </button>
  </div>
@stop
@section('content')
  <div class=" p-3">
    <table class="table"
      id="table_id">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $tag->name }}</td>
            <td>
              <button class="btn btn-info"
                data-toggle="modal"
                data-target="#modal-{{ $tag->id }}">Edit</button>
              <a href="javascript:void(0)"><button class="btn btn-danger"
                  onclick="swal('warning','Are you sure wnet to delete this tag?','warning',{
                            buttons: {                                                                            cancel: 'Cancle',                                                                           catch: {                                                                         text:'Delete',
                            value:'delete'
                            }
                            }
                            }).then((value)=>{
                            if(value !== null){
                            document.getElementById('delete-tag-form').submit()
                            }
                            })
                            ">Delete</button></a>
              <form id="delete-tag-form"
                action="{{ route('tags.destroy', $tag) }}"
                style="display: none"
                method="POST">
                @csrf
                @method("DELETE")
              </form>
            </td>
          </tr>
          <!-- Update tag Modal -->
          <div class="modal fade"
            id="modal-{{ $tag->id }}"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"
                    id="exampleModalLabel">Edit {{ $tag->name }}
                  </h4>
                  <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
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
                  <form action="{{ route('tags.update', $tag) }}"
                    method="POST"
                    id="tag-update-form-{{ $tag->id }}">
                    @csrf
                    @method("PUT")
                    <div>
                      <label for="name">Name</label>
                      <input type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        value="{{ $tag->name }}">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button"
                    class="btn btn-outline-secondary"
                    data-dismiss="modal">Close</button>
                  <button type="button"
                    class="btn btn-outline-success"
                    onclick="document.getElementById('tag-update-form-{{ $tag->id }}').submit()">Update</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- Add new Tag Modal -->
  <div class="modal fade"
    id="createTagModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"
            id="exampleModalLabel">Add New Tag</h4>
          <button type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close">
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
          <form action="{{ route('tags.store') }}"
            method="POST"
            id="tag-form">
            @csrf
            <div>
              <label for="name">Name</label>
              <input type="text"
                class="form-control"
                name="name"
                id="name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button"
            class="btn btn-outline-secondary"
            data-dismiss="modal">Close</button>
          <button type="button"
            class="btn btn-outline-primary"
            onclick="document.getElementById('tag-form').submit()">Create</button>
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

  </script>
@stop
