@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Attribute /</span> List</h4>
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
        <h5 class="card-header">Attribute </h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
            <div class="">
                <a class="btn btn-success" href="{{ route('admin.attribute.create') }}"
                    class="text-muted float-end">Create</a>
            </div>
        </div>

        <div class="card-datatable">
            <table class="datatables-ajax table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($attributes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->name, 30) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->slug, 30) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.attribute.edit', ['slug' => $item->slug]) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.attribute.delete', ['slug' => $item->slug]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Xoa thuoc tính?')" class="dropdown-item"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <div class="px-4">
                        {{ $attributes->links('pagination::bootstrap-5') }}
                    </div> --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

@endsection

@section('js')
    <script>
        let tableName = 'attribute';
        let status = 'index';
    </script>
    @include('admin.elements.js')
@endsection
