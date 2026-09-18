@extends('layouts.admin.app')

@section('title', 'Order Page - Admin Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Order Data List</h1>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>BUYER</th>
                        <th>ALBUM</th>
                        <th>QTY</th>
                        <th>TOTAL</th>
                        <th>PAYMENT PROOF</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $order->buyer->name }}</td>
                            <td>{{ $order->album->title }}</td>
                            <td>{{ number_format($order->qty, 0, ',', '.') }}</td>
                            <td class="text-start">IDR {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                @if ($order->payment_proof)
                                    <img src="{{ asset('storage/orders/' . $order->payment_proof) }}" width="80px" />
                                @else
                                    <em class="text-muted">No Payment Proof Uploaded</em>
                                @endif
                            </td>
                            <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
                            <td>
                                <a href="{{ route('admin.order.show', encrypt($order->id)) }}"
                                    class="btn btn-link admin-action admin-action-view p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('admin.order.edit', encrypt($order->id)) }}"
                                    class="btn btn-link admin-action admin-action-edit p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="javascript:void()"
                                    onclick="handleDestroy('{{ route('admin.order.destroy', encrypt($order->id)) }}')"
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
