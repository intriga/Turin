@extends('backend.layouts.app')

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
            <h1>Compose</h1>
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
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="{{ url('dashboard/posts') }}" class="btn btn-default" title="Previous">
                  <i class="fas fa-reply"></i>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{ $post->title }}</h5>
                <h6>
                  <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span>
                </h6>
              </div>

              <div class="mailbox-read-message">
                <div class="text-center">
                  <img src="{{ asset($post->image) }}" class="img-fluid rounded w-75 p-3">
                </div>
                <br>
                <br>
                <p>{!! $post->content !!}</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <form action="{{ url('dashboard/post/'.$post->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">
                <i class="far fa-trash-alt"></i> 
                Delete
              </button>
              <a href="{{ url('dashboard/post/'.$post->id.'/edit') }}" class="btn btn-warning">
              <i class="far fa-edit"></i>
                Edit
              </a>
              </form>
            </div>
            <!-- /.card-footer -->
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
  <!-- /.content-wrapper -->

  @include('backend.includes.footer')

@endsection