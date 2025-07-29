@extends('layout.admin')

@section('title', 'Đợi thanh toán')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bill /</span> Chờ thanh toán(thanh toán online thất bại)
    </h4>
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
    <div class="card">
        <h5 class="card-header">Bill</h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
        </div>
        <div class="card-datatable">
            <table class="datatables-ajax table table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Order Date</th>
                        <th>Payment</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($bills as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->recipient_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</td>
                            <td>
                                @if ($item->payment_status == 'Paid')
                                    <span class="badge bg-label-success">Đã thanh toán</span>
                                @elseif ($item->payment_status == 'Payment Failed')
                                    <span class="badge bg-label-danger">Thanh toán thất bại</span>
                                @elseif ($item->payment_status == 'Unpaid')
                                    <span class="badge bg-label-primary">Chưa thanh toán</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-success">
                                    {{ number_format($item->total_amount, 0, '.', '.') ?? '' }}</span>
                                <span>VNĐ</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.bill.show', ['id' => $item->id]) }}" data-bs-toggle="tooltip"
                                        class="text-body" data-bs-placement="top" aria-label="Show"
                                        data-bs-original-title="Show">
                                        <i class="ti ti-eye mx-2 ti-sm"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <div class="px-4">
                        {{ $bills->links('pagination::bootstrap-5') }}
                    </div>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Order Date</th>
                        <th>Payment</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/administrator/assets/vendor/js/dropdown-hover.js') }}"></script>
    <script>
        let tableName = 'bill';
        let status = 'waitingpayment';
    </script>
    @include('admin.elements.js')
@endsection
