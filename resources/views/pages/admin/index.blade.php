@extends('layouts.admin.app')

@section('title', 'Admin Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Admin Data List</h1>
    </div>

    <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
        <span class="fa fa-plus-circle"></span>
        <span>Create New</span>
    </a>

    <hr>

    <div class="admin-card">
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.admin.show', encrypt($user->id)) }}"
                                    class="btn btn-link admin-action admin-action-view p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('admin.admin.edit', encrypt($user->id)) }}"
                                    class="btn btn-link admin-action admin-action-edit p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="javascript:void()"
                                    onclick="handleDestroy('{{ route('admin.admin.destroy', encrypt($user->id)) }}')"
                                    class="btn btn-link admin-action admin-action-delete p-0 mx-2">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form id="form-destroy" action="" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

    <hr>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('.datatable').DataTable();

        function handleDestroy(url) {
            Swal.fire({
                title: "Are you sure want to delete it?",
                text: "You cannot recover it",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-destroy').attr('action', url);
                    $('#form-destroy').submit();
                }
            });
        }
    </script>
@endpush
