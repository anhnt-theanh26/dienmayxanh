@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting /</span> List</h4>
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
        <h5 class="card-header">Setting</h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
            <div class="">
                <a class="btn btn-success" href="{{ route('admin.setting.create') }}"
                    class="text-muted float-end">Create</a>
            </div>
        </div>
        <div class="card-datatable">
            <table class="datatables-ajax table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Color Main</th>
                        <th>Color Secondary</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($settings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <span class="badge badge-center" style="background: {{ $item->main_color }}"><i
                                        class="ti ti-palette"></i></span>
                            </td>
                            <td>
                                <span class="badge badge-center" style="background: {{ $item->secondary_color }}"><i
                                        class="ti ti-palette"></i></span>
                            </td>
                            <td>
                                <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->status ? 'Yes' : 'Not' }}
                                </span>
                            </td>
                            <td>
                                <img src="{{ $item->logo }}" alt="{{ $item->name }}" width="50px" id="img"
                                    class="py-1">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if ($item->status == false)
                                            <form action="{{ route('admin.setting.status', $item->id) }}" method="post">
                                                @csrf
                                                <button onclick="return confirm('Sử dụng cài đặt này?')"
                                                    class="dropdown-item"><i class="ti ti-toggle-right me-1"></i>
                                                    Using</button>
                                            </form>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('admin.setting.edit', $item->id) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.setting.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Xóa cài đặt?')" class="dropdown-item"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <div class="px-4">
                        {{ $settings->links('pagination::bootstrap-5') }}
                    </div>

                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Color Main</th>
                        <th>Color Secondary</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let tableName = 'setting';
        let status = 'index';
    </script>
    @include('admin.elements.js')
@endsection
