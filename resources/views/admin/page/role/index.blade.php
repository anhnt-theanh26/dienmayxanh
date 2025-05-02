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
    <div class="row g-4">
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-normal mb-2">Total {{ $role->users_count }} users</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @foreach ($role->users as $user)
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle"
                                            src="{{ $user->image ? asset($user->image) : asset('storage/default.jpg') }}"
                                            alt="Avatar" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1">
                            <div class="role-heading">
                                <h4 class="mb-1">{{ $role->name }}</h4>
                                <a href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#editRoleModal{{ $role->id }}" class="role-edit-modal"><span>Edit
                                        Role</span></a>
                            </div>
                            <form action="{{ route('admin.role.destroy', ['id' => $role->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Xoa role nay?')" class="btn text-muted"><i
                                        class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="{{ asset('/administrator/assets/img/illustrations/add-new-roles.png') }}"
                                class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="btn btn-primary mb-2 text-nowrap add-new-role">
                                Add New Role
                            </button>
                            <p class="mb-0 mt-1">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="table border-top">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                                @foreach ($role->users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if ($user->authentications->last()->logout_at == null)
                                                <span class="badge bg-label-success" text-capitalized="">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Active</font>
                                                    </font>
                                                </span>
                                            @else
                                                <span class="badge bg-label-secondary" text-capitalized="">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-sm btn-icon">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body delete-record">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="javascript:;"class="dropdown-item">Edit</a>
                                                    <a href="javascript:;" class="dropdown-item">Suspend</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Role Table -->
        </div>
    </div>
    <!--/ Role cards -->

    <!-- Add Role Modal -->
    {{-- model role edit --}}
    @foreach ($roles as $role)
        @php
            $result = [];
            $roleHasPermissions = \App\Http\Controllers\Admin\RoleController::getRoleHasPermissions($role->id);
            foreach ($roleHasPermissions as $key => $value) {
                array_push($result, $value->permission_id);
            }
        @endphp
        <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h3 class="role-title mb-2">Edit Role</h3>
                            <p class="text-muted">Set role permissions</p>
                        </div>
                        <!-- Add role form -->
                        <form action="{{ route('admin.role.update', ['id' => $role->id]) }}" method="post"
                            id="addRoleForm" class="row g-3">
                            @csrf
                            @method('put')
                            <div class="col-12 mb-4">
                                <label class="form-label" for="modalRoleName">Role Name</label>
                                <input type="text" id="modalRoleName" name="modalRoleName" class="form-control"
                                    value="{{ $role->name }}" placeholder="Enter a role name" tabindex="-1" />
                                @error('modalRoleName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <h5>Role Permissions</h5>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap fw-semibold">
                                                    Administrator Access
                                                    <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Allows a full access to the system"></i>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll"> Select All
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @error('permissions')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('permissions.*')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @foreach ($groupedPermissions as $groupName => $items)
                                                <tr>
                                                    <td class="text-nowrap fw-semibold">{{ $groupName }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @foreach ($items as $item)
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        {{ in_array($item->id, $result) ? 'checked' : '' }}
                                                                        name="permissions[]" id="{{ $item->name }}"
                                                                        value="{{ $item->id }}" />
                                                                    <label class="form-check-label"
                                                                        for="{{ $item->name }}">
                                                                        {{ $item->display_name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        </form>
                        <!--/ Add role form -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- model thêm mới role --}}
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Add New Role</h3>
                        <p class="text-muted">Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ route('admin.role.store') }}" method="post" id="addRoleForm" class="row g-3">
                        @csrf
                        <div class="col-12 mb-4">
                            <label class="form-label" for="roleName">Role Name</label>
                            <input type="text" id="roleName" name="roleName" value="{{ old('roleName') }}"
                                class="form-control"placeholder="Enter a role name" tabindex="-1" />
                            @error('roleName')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <h5>Role Permissions</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">
                                                Administrator Access
                                                <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Allows a full access to the system"></i>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="selectAll"
                                                        name="selectAll" />
                                                    <label class="form-check-label" for="selectAll"> Select All </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($groupedPermissions as $groupName => $items)
                                            <tr>
                                                <td class="text-nowrap fw-semibold">{{ $groupName }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach ($items as $item)
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="{{ $item->name }}" name="permission_id[]"
                                                                    value="{{ $item->id }}" />
                                                                <label class="form-check-label"
                                                                    for="{{ $item->name }}">
                                                                    {{ $item->display_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
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
