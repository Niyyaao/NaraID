@extends('layouts.admin.app')

@section('title', 'Buyer Details Page - Admin Dashboard')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">BUYER DETAIL</h1>
    </div>

    <div class="admin-detail-card">
        <div class="card-body">

            <div class="admin-detail-row">
                <label>ID</label>
                <input type="text" value="{{ $buyer->id }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Name</label>
                <input type="text" value="{{ $buyer->name }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Email</label>
                <input type="text" value="{{ $buyer->email }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Phone</label>
                <input type="text" value="{{ $buyer->phone }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Created At</label>
                <input type="text" value="{{ $buyer->created_at }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Updated At</label>
                <input type="text" value="{{ $buyer->updated_at }}" readonly>
            </div>

            <div class="admin-actions">

                <a href="{{ route('admin.buyer.index') }}" class="btn btn-secondary">
                    <span class="fa fa-times-circle"></span>
                    Cancel
                </a>

                <a href="javascript:void()"
                    onclick="handleDestroy('{{ route('admin.buyer.destroy', encrypt($buyer->id)) }}')"
                    class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                    Delete
                </a>

            </div>

        </div>
    </div>

    <form id="form-destroy" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
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
