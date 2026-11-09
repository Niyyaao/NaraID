@extends('layouts.admin.app')

@section('title', 'Admin Details Page')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">ADMIN DETAIL</h1>
    </div>

    <div class="admin-detail-card">
        <div class="card-body">

            <div class="admin-detail-row">
                <label>ID</label>
                <input type="text" value="{{ $user->id }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Name</label>
                <input type="text" value="{{ $user->name }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Email</label>
                <input type="text" value="{{ $user->email }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Role</label>
                <input type="text" value="{{ $user->isOwner() ? 'Owner' : 'Admin' }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Created At</label>
                <input type="text" value="{{ $user->created_at }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Updated At</label>
                <input type="text" value="{{ $user->updated_at }}" readonly>
            </div>


            <div class="admin-actions">
                @if (auth('web')->user()->isOwner() && !$user->isOwner())
                    <a href="{{ route('admin.admin.edit', encrypt($user->id)) }}" class="btn btn-primary">
                        <span class="fa fa-edit"></span>
                        Edit
                    </a>
                @endif

                <a href="{{ route('admin.admin.index') }}" class="btn btn-secondary">
                    <span class="fa fa-times-circle"></span>
                    Cancel
                </a>

                @if (auth('web')->user()->isOwner() && !$user->isOwner())
                    <a href="{{ route('admin.admin.edit', encrypt($user->id)) }}" class="btn btn-primary">
                        <span class="fa fa-edit"></span>
                        Edit
                    </a>
                @endif
            </div>

        </div>
    </div>

    <form id="form-destroy" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <hr>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
