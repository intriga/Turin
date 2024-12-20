@extends('backend.layouts.app')

@push('styles')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
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
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <a href="{{ url('dashboard/user/create') }}" type="button" class="btn btn-outline-success btn-block">
                                <i class="nav-icon fas fa-plus"></i>
                                Create User
                            </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->getRoleNames()->isNotEmpty())
                                                {{ $user->getRoleNames()->implode(', ') }} <!-- Display roles as a comma-separated list -->
                                            @else
                                                No Role
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format("m/d/Y H:i:s") }}</td>
                                        <td>
                                            <form id="formulario" action="{{ url('dashboard/user/'.$user->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <a href="{{ url('dashboard/user/'.$user->id) }}" type="button" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('dashboard/user/'.$user->id.'/edit') }}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button id="deletePost" type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>                
                <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@include('backend.includes.footer')

@endsection

{{-- Add common CSS customizations --}}

@push('scripts')
<!-- datatables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#example', {
        order: [[0, 'desc']]
    });
</script>


<!-- SweetAlert2 -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>

    const removePost = document.getElementById('deletePost');

    eventListeners();

    function eventListeners(e) {
        removePost.addEventListener('click', deletePost);
    }

    function deletePost(e) {
        e.preventDefault();
        // console.log('eliminado');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formulario').submit();
            }
            
        })
    }
    
</script>
<!-- DELETE POST -->
@if (session('danger'))
    <script>
        Swal.fire(
            'Deleted!',
            'Your post has been deleted.',
            'success'
        )
    </script>
@endif

<!-- CREATE POST -->
@if (session('info'))
    <script>
        Swal.fire(
            'Created!',
            'Your post has been created.',
            'success'
        )
    </script>
@endif

<!-- UPDATE POST -->
@if (session('success'))
    <script>
        Swal.fire(
            'Created!',
            'Your post has been updated.',
            'success'
        )
    </script>
@endif

@endpush

