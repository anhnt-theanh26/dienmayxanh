@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category Parent/</span> List</h4>
    <div class="card-body">

        {{-- <div class="alert alert-success alert-dismissible" role="alert">
            This is a success dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="alert alert-danger alert-dismissible" role="alert">
            This is a danger dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}

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
        <h5 class="card-header">Category Parent</h5>
        <div class="card-datatable table-responsive">
            <div class="d-flex justify-content-between card-header my-0 py-0">
                <label>Search:
                    <input type="search" class="form-control" name="search" placeholder="Search...">
                </label>
                <div class="">
                    <a class="btn btn-success" href="{{ route('admin.category-parent.create') }}"
                        class="text-muted float-end">Create</a>
                </div>
            </div>
            <table class="dt-fixedheader table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($categoryParents as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.category-parent.edit', ['id' => $item->id]) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.category-parent.delete', ['id' => $item->id]) }}"
                                            method="post">
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
                    {{-- <div class="px-4">
                        {{ $categoryParents->links('pagination::bootstrap-5') }}
                    </div> --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
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
        let tableName = 'category-parent';
        let status = 'index';
    </script>
    @include('admin.elements.js')
@endsection
