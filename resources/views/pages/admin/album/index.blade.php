@extends('layouts.admin.app')

@section('title', 'Album Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Album Data List</h1>
    </div>

    <div class="admin-actions">
    <a href="{{ route('admin.album.create') }}" class="btn btn-primary">
        <span class="fa fa-plus-circle"></span>
        <span>Create New</span>
    </a>
    </div>

    <hr>

    <div class="admin-card">
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>IMAGE</th>
                        <th>TITLE</th>
                        <th>ARTIST</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($album->image)
                                    <img src="{{ asset('storage/albums/' . $album->image) }}" width="80px" />
                                @else
                                    <em class="text-muted">Empty Image</em>
                                @endif
                            </td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->artist_name }}</td>
                            <td class="text-start">IDR {{ number_format($album->price, 0, ',', '.') }}</td>
                            <td>{{ number_format($album->stock, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.album.show', encrypt($album->id)) }}"
                                    class="btn btn-link admin-action admin-action-view p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('admin.album.edit', encrypt($album->id)) }}"
                                    class="btn btn-link admin-action admin-action-edit p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="javascript:void()"
                                    onclick="handleDestroy('{{ route('admin.album.destroy', encrypt($album->id)) }}')"
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
