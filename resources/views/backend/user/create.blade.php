@extends('backend.layouts.app')

@push('styles')

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
                        <h1>User</h1>
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
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <!-- /.card-header -->
                        <form method="post" action="{{ url('/dashboard/user') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="password">
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

