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

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="inputStatus">Title Post</label>
                                            <input class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="inputStatus">Category</label>
                                            <select id="inputStatus" name="category" class="form-control custom-select">
                                                <option selected="" disabled="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control d-none" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
                                        
                                    </div>

                                    <div class="form-group">
                                        <textarea id="compose-textarea" name="content" class="form-control" style="height: 500px">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="btn btn-success btn-file">
                                            <i class="fas fa-paperclip"></i> Select Image
                                            <input type="file" id="image" name="image">
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Create</button>
                                    </div>
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

        // sumernote
        $(function () {
            //Add text editor
            $('#compose-textarea').summernote({
                height: 400
            })
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