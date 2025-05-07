@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->slug }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($status == 'index')
                        <a class="dropdown-item" href="{{ route('admin.category-parent.edit', ['id' => $item->id]) }}">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.category-parent.delete', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa danh muc?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @else
                        <form action="{{ route('admin.category-parent.restore', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-repeat me-1"></i> Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.category-parent.destroy', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Hanh dong nay se xoa vinh vien danh muc?')"
                                class="dropdown-item"><i class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@endforeach
