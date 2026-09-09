@extends('layouts.admin.app')

@section('title', 'Buyer Page - Admin Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Buyer Data List</h1>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buyers as $buyer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td>{{ $buyer->phone }}</td>
                            <td>
                                <a href="{{ route('admin.buyer.show', encrypt($buyer->id)) }}"
                                    class="btn btn-link admin-action admin-action-view p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="javascript:void()"
                                    onclick="handleDestroy('{{ route('admin.buyer.destroy', encrypt($buyer->id)) }}')"
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
