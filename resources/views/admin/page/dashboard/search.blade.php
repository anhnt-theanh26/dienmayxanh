@foreach ($results as $item)
    <tr>
        <td>{{ $item->code }}</td>
        <td>
            @if ($item->payment_method == 'offline')
                <div class="badge bg-label-primary me-3 rounded p-2">
                    <i class="ti ti-wallet ti-sm"></i>
                </div>
            @else
                <div class="badge bg-label-success rounded me-3 p-2">
                    <i class="ti ti-browser-check ti-sm"></i>
                </div>
            @endif
        </td>
        <td>
            <span class="fw-bold text-success">
                {{ \App\Http\Controllers\Admin\AdminController::formatCurrencyVN($item->total_amount) }}
            </span>
        </td>
        <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</td>
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
                    @if ($item->status != 'Cancelled' && $item->status_cancel == 'requested')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.reply-cancel', ['id' => $item->id, 'status' => 'accepted']) }}">
                                <i class="ti ti-pencil me-1"></i> Accept
                            </a>
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.reply-cancel', ['id' => $item->id, 'status' => 'rejected']) }}">
                                <i class="ti ti-pencil me-1"></i> Refuse
                            </a>
                        </div>
                    @endif
                    @if ($item->status == 'Pending' && $item->payment_method == 'offline' && $item->status_cancel != 'requested')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Confirmed']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Confirmed
                            </a>
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Preparing']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Preparing
                            </a>
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Shipping']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Shipping
                            </a>
                        </div>
                    @endif
                    @if ($item->status == 'Confirmed' && $item->status_cancel != 'requested')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Preparing']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Preparing
                            </a>
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Shipping']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Shipping
                            </a>
                        </div>
                    @endif
                    @if ($item->status == 'Preparing' && $item->status_cancel != 'requested')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Shipping']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Shipping
                            </a>
                        </div>
                    @endif
                    @if ($item->status = 'Shipping')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.status', ['id' => $item->id, 'status' => 'Delivered']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Delivered
                            </a>
                        </div>
                    @endif
                    @if ($item->status == 'Cancelled' && $item->refund_status == 'Pending')
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.reply-refund', ['id' => $item->id, 'status' => 'Success']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Accept
                            </a>
                            <a class="dropdown-item"
                                href="{{ route('admin.bill.reply-refund', ['id' => $item->id, 'status' => 'Failed']) }}">
                                <i class="ti ti-pencil me-1"></i>
                                Refuse
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </td>
    </tr>
@endforeach
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
