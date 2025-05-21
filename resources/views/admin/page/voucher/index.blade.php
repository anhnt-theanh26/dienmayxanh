@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Voucher /</span> List</h4>
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
        <h5 class="card-header">Voucher </h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
            <div class="">
                <a class="btn btn-success" href="{{ route('admin.voucher.create') }}"
                    class="text-muted float-end">Create</a>
            </div>
        </div>

        <div class="card-datatable">
            <table class="datatables-ajax table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Code</th>
                        <th>%</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Max discount</th>
                        <th>Use</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($vouchers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->promo_code }}</td>
                            <td>{{ $item->discount_percentage }}%</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->start_date)->format('d/m') }} -
                                {{ \Carbon\Carbon::parse($item->end_date)->format('d/m') }}
                            </td>
                            <td>
                                <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->status ? 'Yes' : 'Not' }}
                                </span>
                            </td>
                            <td>{{ number_format($item->max_discount, 0, '.', '.') }}đ</td>
                            <td>{{ $item->max_use }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.voucher.edit', ['id' => $item->id]) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.voucher.destroy', ['id' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Xoa voucher?')" class="dropdown-item"><i
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
                        <th>id</th>
                        <th>Code</th>
                        <th>%</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Max discount</th>
                        <th>Use</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

@endsection

@section('js')
    <script>
        let tableName = 'voucher';
        let status = 'index';
    </script>
    @include('admin.elements.js')
@endsection
