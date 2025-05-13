@foreach ($results as $item)
    <tr>
        <td>{{ $item->sku }}</td>
        <td>{{ \Illuminate\Support\Str::limit($item->name, 30) }}</td>
        <td>
            <img src="{{ $item->image }}" alt="" width="50px" id="img" class="py-1">
        </td>
        <td>
            <span class="badge {{ $item->is_hot ? 'bg-success' : 'bg-secondary' }}">
                {{ $item->is_hot ? 'Yes' : 'Not' }}
            </span>
        </td>
        <td>{{ $item->category->name }}</td>
        <td>
            <div class="dropdown">
                <a href="{{ route('admin.product.show', ['id' => $item->id]) }}" data-bs-toggle="tooltip" class="text-body"
                    data-bs-placement="top" aria-label="Show" data-bs-original-title="Show">
                    <i class="ti ti-eye mx-2 ti-sm"></i>
                </a>
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($status == 'index')
                        <a class="dropdown-item" href="{{ route('admin.product.edit', ['id' => $item->id]) }}">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.product.delete', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa danh muc?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @else
                        <form action="{{ route('admin.product.restore', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-repeat me-1"></i> Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.product.destroy', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Hanh dong nay se xoa vinh vien san pham?')"
                                class="dropdown-item"><i class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@endforeach
