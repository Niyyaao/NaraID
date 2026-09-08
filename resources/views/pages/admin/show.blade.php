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
                <label>Created At</label>
                <input type="text" value="{{ $user->created_at }}" readonly>
            </div>

            <div class="admin-detail-row">
                <label>Updated At</label>
                <input type="text" value="{{ $user->updated_at }}" readonly>
            </div>

            
            <div class="admin-actions">

                <a href="{{ route('admin.admin.edit', encrypt($user->id)) }}"
                    class="btn btn-primary">
                    <span class="fa fa-edit"></span>
                    Edit
                </a>

                <a href="{{ route('admin.admin.index') }}"
                    class="btn btn-secondary">
                    <span class="fa fa-times-circle"></span>
                    Cancel
                </a>

                <button type="button"
                    onclick="handleDestroy('{{ route('admin.admin.destroy', encrypt($user->id)) }}')"
                    class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                    Delete
                </button>

            </div>

        </div>
    </div>

    <form id="form-destroy" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <hr>
@endsection