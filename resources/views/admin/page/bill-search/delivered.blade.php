@foreach ($results as $item)
    <tr>
        <td>{{ $item->code }}</td>
        <td>{{ $item->recipient_name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</td>
        <td>
            @if ($item->payment_status == 'Paid')
                <span class="badge bg-label-success">Đã thanh toán</span>
            @elseif ($item->payment_status == 'Payment Failed')
                <span class="badge bg-label-danger">Thanh toán thất bại</span>
            @elseif ($item->payment_status == 'Unpaid')
                <span class="badge bg-label-primary">Chưa thanh toán</span>
            @endif
        </td>
        <td>
            <span class="fw-bold text-success">
                {{ number_format($item->total_amount, 0, '.', '.') ?? '' }}</span>
            <span>VNĐ</span>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.bill.show', ['id' => $item->id]) }}" data-bs-toggle="tooltip" class="text-body"
                    data-bs-placement="top" aria-label="Show" data-bs-original-title="Show">
                    <i class="ti ti-eye mx-2 ti-sm"></i>
                </a>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Xoa danh muc?')" class="dropdown-item"><i
                                    class="ti ti-trash me-1"></i>
                                Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
