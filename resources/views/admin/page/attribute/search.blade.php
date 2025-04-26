@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ \Illuminate\Support\Str::limit($item->name, 30) }}</td>
        <td>{{ \Illuminate\Support\Str::limit($item->slug, 30) }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($status == 'index')
                        <a class="dropdown-item" href="{{ route('admin.attribute.edit', ['slug' => $item->slug]) }}">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.attribute.delete', ['slug' => $item->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa thuoc tính?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @else
                        <form action="{{ route('admin.attribute.restore', ['slug' => $item->slug]) }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-repeat me-1"></i> Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.attribute.destroy', ['slug' => $item->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Hanh dong nay se xoa vinh vien thuoc tính?')"
                                class="dropdown-item"><i class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@endforeach
