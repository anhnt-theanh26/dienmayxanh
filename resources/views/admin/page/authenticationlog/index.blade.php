@extends('layout.admin')

@section('title', 'Danh sach')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Authentication Log /</span> List</h4>
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
        <h5 class="card-header">Authentication Log</h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
        </div>
        <div class="card-datatable">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Type</th>
                        <th>Ip</th>
                        <th>User Agent</th>
                        <th>Login At</th>
                        <th>Logout At</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($authenticationlogs as $item)
                        <tr>
                            <td>
                                <ul class="menu-item m-0 p-0">
                                    <li class="menu-item m-0 p-0">Name: {{ $item->user->name }}</li>
                                    <li class="menu-item m-0 p-0">Email: {{ $item->user->email }}</li>
                                    <li class="menu-item m-0 p-0">Phone: {{ $item->user->phone }}</li>
                                </ul>
                            </td>
                            <td>{{ $item->authenticatable_type }}</td>
                            <td>{{ $item->ip_address }}</td>
                            <td>
                                <p>{{ $item->user_agent }}</p>
                            </td>
                            <td>{{ $item->login_at }}</td>
                            <td>{{ $item->logout_at }}</td>
                        </tr>
                    @endforeach
                    <div class="px-4">
                        {{ $authenticationlogs->links('pagination::bootstrap-5') }}
                    </div>
                </tbody>
                <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Type</th>
                        <th>Ip</th>
                        <th>User Agent</th>
                        <th>Login At</th>
                        <th>Logout At</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('js')
    @include('admin.elements.js')
@endsection
