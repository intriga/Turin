@extends('backend.layouts.app')

@push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <!-- Navbar -->
    @include('backend.includes.navbar')
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('backend.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Create New Post</h3>
              </div>
              <!-- /.card-header -->
                <form method="post" action="{{ url('/dashboard/post') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                        <input class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                        <input class="form-control" id="slug" name="slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <textarea id="compose-textarea" name="content" name="content" class="form-control" style="height: 500px">
                            
                            </textarea>
                        </div>
                        <div class="form-group">
                        <div class="btn btn-success btn-file">
                            <i class="fas fa-paperclip"></i> Select Image
                            <input type="file" id="image" name="image">
                        </div>
                        <p class="help-block">Max. 32MB</p>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                        <!-- 
                        <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                        -->
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Create</button>
                        </div>
                        <!-- 
                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                        -->
                    </div>
                    <!-- /.card-footer -->

                </form>
                            
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('backend.includes.footer')

@endsection

@push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })
    </script>
@endpush