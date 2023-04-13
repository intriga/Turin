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
                    <h1>Category</h1>
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
                <h3 class="card-title">Create New Category</h3>

                <div class="card-tools">
                    <a href="{{ url('dashboard/categories') }}" class="btn btn-default" title="Previous">
                    <i class="fas fa-reply"></i>
                    </a>
                </div>

              </div>
              <!-- /.card-header -->
                <form method="post" action="{{ url('/dashboard/category/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control d-none" id="slug" name="slug" value="{{ $category->slug }}">
                        </div>
                        
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                        <!-- 
                        <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                        -->
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Edit Category</button>
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

    <!-- stringtoslug -->
    <script src="{{ asset('backend/stringToSlug/speakingurl.min.js') }}"></script>
    <script src="{{ asset('backend/stringToSlug/jquery.stringtoslug.js') }}"></script>

    <script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })

     // stringtoslug
     $(document).ready( function() {
        $('#title').stringToSlug({
            space: '-',
            replace: /\s?\([^\)]*\)/gi,
            AND: 'y',
            getPut: 'input#slug'
        });
    });
    </script>
@endpush