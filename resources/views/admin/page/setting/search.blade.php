@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>
            <span class="badge badge-center" style="background: {{ $item->main_color }}"><i
                    class="ti ti-palette"></i></span>
        </td>
        <td>
            <span class="badge badge-center" style="background: {{ $item->secondary_color }}"><i
                    class="ti ti-palette"></i></span>
        </td>
        <td>
            <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }}">
                {{ $item->status ? 'Yes' : 'Not' }}
            </span>
        </td>
        <td>
            <img src="{{ $item->logo }}" alt="{{ $item->name }}" width="50px" id="img" class="py-1">
        </td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    @if ($item->status == false)
                        <form action="{{ route('admin.setting.status', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button onclick="return confirm('Sử dụng cài đặt này?')" class="dropdown-item"><i
                                    class="ti ti-toggle-right me-1"></i>
                                Using</button>
                        </form>
                    @endif
                    <a class="dropdown-item" href="{{ route('admin.setting.edit', ['id' => $item->id]) }}">
                        <i class="ti ti-pencil me-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.setting.destroy', ['id' => $item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Xóa cài đặt?')" class="dropdown-item"><i
                                class="ti ti-trash me-1"></i>
                            Delete</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
@endforeach
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
