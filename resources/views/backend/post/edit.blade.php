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

                            <div class="card-tools">
                                <a href="{{ url('/post/'.$post->slug) }}" class="btn btn-outline-primary" target="_blank">
                                    Watch Post
                                </a>
                                <a href="{{ url('dashboard/posts') }}" class="btn btn-default" title="Previous">
                                    <i class="fas fa-reply"></i>
                                </a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <form method="post" action="{{ url('/dashboard/post/'.$post->id.'/edit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">                                

                                <div class="form-group">
                                    <input class="form-control" id="title" name="title" value="{{ $post->title }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control d-none" id="slug" name="slug" value="{{ $post->slug }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Category</label>
                                    <input type="hidden" name="category" value="{{ $post->category_id }}">
                                    <select id="inputStatus" name="category" class="form-control custom-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" name="content" name="content" class="form-control" style="height: 500px">
                                        {{ $post->content }}
                                    </textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                    <div class="text-center">
                                        <img src="{{ asset($post->image) }}" class="img-fluid rounded w-50 p-5">
                                    </div>
                                
                                <div class="form-group">
                                    <div class="btn btn-success btn-file">
                                        <i class="fas fa-paperclip"></i> Change Image
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
                                <!-- 
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                                -->
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Edit Post</button>
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