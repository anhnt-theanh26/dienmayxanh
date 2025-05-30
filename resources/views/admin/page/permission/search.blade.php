@foreach ($results as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>
            <img src="{{ asset($user->image) }}" alt="" width="50px" id="img" class="py-1">
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
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @foreach ($roles as $role)
                        <form action="{{ route('admin.permission.update', ['id' => $user->id]) }}" method="post">
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
                            <button onclick='return confirm("{{ $title }}")' class="dropdown-item">
                                <i class="ti ti-pencil me-1"></i>
                                Set {{ Str::ucfirst($role->name) }}
                            </button>
                        </form>
                    @endforeach
                    <form action="{{ route('admin.permission.update', ['id' => $user->id]) }}" method="post">
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
                </div>
            </div>
        </td>
    </tr>
@endforeach
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
