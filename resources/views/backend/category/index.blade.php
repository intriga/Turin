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
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
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
                        @if(auth()->user()->can('create')) <!-- Check if the user can create articles -->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="{{ url('dashboard/category/create') }}" type="button" class="btn btn-outline-success btn-block">
                                        <i class="nav-icon fas fa-plus"></i>
                                        Create Category
                                    </a>
                                </h3>                            
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-striped text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at->format("m/d/Y H:i:s") }}</td>
                                    <td>
                                        <form id="formulario" action="{{ url('dashboard/category/'.$category->id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <a href="{{ url('dashboard/category/'.$category->slug) }}" type="button" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if(auth()->user()->can('create'))
                                        <a href="{{ url('dashboard/category/'.$category->id.'/edit') }}" type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button id="deletePost" type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @endif

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
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@include('backend.includes.footer')

@endsection

@push('css')
<!-- datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

@endpush

@push('scripts')
<!-- datatables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

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

