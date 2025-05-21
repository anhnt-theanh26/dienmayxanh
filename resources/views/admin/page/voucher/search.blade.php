@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->promo_code }}</td>
        <td>{{ $item->discount_percentage }}</td>
        <td>{{ $item->start_date }}</td>
        <td>{{ $item->end_date }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->max_discount }}</td>
        <td>{{ $item->max_use }}</td>
        <td>{{ $item->discount_condition }}</td>
        <td>{{ $item->users }}</td>
        <td>{{ $item->products }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.voucher.edit', ['id' => $item->id]) }}">
                        <i class="ti ti-pencil me-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.voucher.destroy', ['id' => $item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Xoa voucher?')" class="dropdown-item"><i
                                class="ti ti-trash me-1"></i>
                            Delete</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
@endforeach
