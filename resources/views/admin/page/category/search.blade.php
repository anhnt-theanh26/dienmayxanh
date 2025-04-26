@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->slug }}</td>
        <td>
            <span class="badge {{ $item->is_hot ? 'bg-success' : 'bg-secondary' }}">
                {{ $item->is_hot ? 'Yes' : 'Not' }}
            </span>
        </td>
        <td>
            <img src="{{ asset($item->image) }}" alt="" width="50px" id="img" class="py-1">
        </td>
        <td>{{ $item->parent->name }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($status == 'index')
                        <a class="dropdown-item" href="{{ route('admin.category.edit', ['slug' => $item->slug]) }}">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.category.delete', ['slug' => $item->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa danh muc?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @else
                        <form action="{{ route('admin.category.restore', ['slug' => $item->slug]) }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-repeat me-1"></i> Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.category.destroy', ['slug' => $item->slug]) }}" method="post">
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
