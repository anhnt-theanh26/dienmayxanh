@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->name, 30) }}</td>
                            <td>
                                <img src="{{ $item->image }}" alt="" width="50px" id="img" class="py-1">
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->birthday }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($status == 'index')
                        <a class="dropdown-item" href="{{ route('admin.user.edit', ['id' => $item->id]) }}">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.user.delete', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa user?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @else
                        <form action="{{ route('admin.user.restore', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-repeat me-1"></i> Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.user.destroy', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Hanh dong nay se xoa vinh vien user?')"
                                class="dropdown-item"><i class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@endforeach
