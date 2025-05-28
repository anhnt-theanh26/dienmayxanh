@extends('layout.admin')

@section('title', 'Đang giao')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bill /</span> List</h4>
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
            <table class="datatables-ajax table">
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
                                <span class="fw-bold text-success"> {{ number_format($item->total_amount, 0, '.', '.') ?? '' }}</span>
                                <span>VNĐ</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <form action="" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Xoa danh muc?')" class="dropdown-item"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
    <script>
        let tableName = 'bill';
        let status = 'index';
    </script>
    @include('admin.elements.js')
@endsection
