@extends('layout.admin')

@section('title', 'Vai trò')

@section('css')
    @include('admin.elements.css')
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

@endsection

@section('content')
    <h4 class="fw-semibold mb-4">Roles List</h4>

    <p class="mb-4">
        A role provided access to predefined menus and features so that depending on <br />
        assigned role an administrator can have access to what user needs.
    </p>
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
        <h5 class="card-header">User</h5>

        <div class="d-flex justify-content-between card-header my-0 py-0">
            <label>Search:
                <input type="search" class="form-control" name="search" placeholder="Search...">
            </label>
        </div>
        <div class="card-datatable">
            <table class="datatables-ajax table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <img src="{{ $user->image }}" alt="" width="50px" id="img" class="py-1">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @php
                                    $roleuser = \App\Http\Controllers\Admin\PermissionController::getRole($user->id);
                                @endphp
                                @if ($roleuser)
                                    {{ Str::ucfirst($roleuser->name) }}
                                @else
                                    User
                                @endif
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->birthday }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach ($roles as $role)
                                            <form action="{{ route('admin.permission.update', ['id' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                @if ($roleuser)
                                                    @php
                                                        $title = "Set user $user->name from $roleuser->name to $role->name";
                                                    @endphp
                                                @else
                                                    @php
                                                        $title = "Set user $user->name to $role->name";
                                                    @endphp
                                                @endif
                                                <button onclick='return confirm("{{ $title }}")'
                                                    class="dropdown-item">
                                                    <i class="ti ti-pencil me-1"></i>
                                                    Set {{ Str::ucfirst($role->name) }}
                                                </button>
                                            </form>
                                        @endforeach
                                        <form action="{{ route('admin.permission.update', ['id' => $user->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="role_id" value="user">
                                            @php
                                                $title = "Set user $user->name to $role->name";
                                            @endphp
                                            <button onclick='return confirm("{{ $title }}")' class="dropdown-item">
                                                <i class="ti ti-pencil me-1"></i>
                                                Set User
                                            </button>
                                        </form>
                                        {{-- @if ($roleuser)
                                                @if ($roleuser->id != $role->id)
                                                    <form
                                                        action="{{ route('admin.permission.update', ['id' => $user->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                        @php
                                                            $title = "Set user $user->name from $roleuser->name to $role->name";
                                                        @endphp
                                                        <button onclick='return confirm("{{ $title }}")'
                                                            class="dropdown-item">
                                                            <i class="ti ti-pencil me-1"></i>
                                                            Set {{ Str::ucfirst($role->name) }}
                                                        </button>
                                                    </form>
                                                    @endif
                                                    <form
                                                        action="{{ route('admin.permission.update', ['id' => $user->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="role_id" value="user">
                                                        @php
                                                            $title = "Set user $user->name to $role->name";
                                                        @endphp
                                                        <button onclick='return confirm("{{ $title }}")'
                                                            class="dropdown-item">
                                                            <i class="ti ti-pencil me-1"></i>
                                                            Set User
                                                        </button>
                                                    </form>
                                            @else
                                                <form action="{{ route('admin.permission.update', ['id' => $user->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                    @php
                                                        $title = "Set user $user->name to $role->name";
                                                    @endphp
                                                    <button onclick='return confirm("{{ $title }}")'
                                                        class="dropdown-item">
                                                        <i class="ti ti-pencil me-1"></i>
                                                        Set {{ Str::ucfirst($role->name) }}
                                                    </button>
                                                </form>
                                            @endif --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <pre>
        @foreach ($users as $user)
      
            {{$role = \App\Http\Controllers\Admin\PermissionController::getRole($user->id)}}
@endforeach
    </pre> --}}
@endsection

@section('js')
    @include('admin.elements.js')
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/js/app-access-roles.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/modal-add-role.js') }}"></script>
@endsection
