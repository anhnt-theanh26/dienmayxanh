@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Restore</h4>
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
        <h5 class="card-header">Product</h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
            <div class="">
                <a class="btn btn-success" href="{{ route('admin.product.create') }}" class="text-muted float-end">Create</a>
            </div>
        </div>
        <div class="card-datatable">
            <table class="datatables-ajax table">
                <thead>
                    <tr>
                        <th>Sku</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Hot</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->sku }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->name, 30) }}</td>
                            <td>
                                <img src="{{ $item->image }}" alt="" width="50px" id="img" class="py-1">
                            </td>
                            <td>
                                <span class="badge {{ $item->is_hot ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_hot ? 'Yes' : 'Not' }}
                                </span>
                            </td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="{{ route('admin.product.show', ['id' => $item->id]) }}"
                                        data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Show"
                                        data-bs-original-title="Show">
                                        <i class="ti ti-eye mx-2 ti-sm"></i>
                                    </a>
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('admin.product.restore', ['id' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            <button class="dropdown-item">
                                                <i class="ti ti-repeat me-1"></i> Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.product.destroy', ['id' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Hanh dong nay se xoa vinh vien san pham?')"
                                                class="dropdown-item"><i class="ti ti-trash me-1"></i>
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
                        <th>Sku</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Hot</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let tableName = 'post';
        let status = 'delete';
    </script>
    @include('admin.elements.js')
@endsection
