@foreach ($results as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->promo_code }}</td>
        <td>{{ $item->discount_percentage }}%</td>
        <td>
            {{ \Carbon\Carbon::parse($item->start_date)->format('d/m/Y H:i') }} -
            {{ \Carbon\Carbon::parse($item->end_date)->format('d/m/Y H:i') }}
        </td>
        <td>
            <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }}">
                {{ $item->status ? 'Yes' : 'Not' }}
            </span>
        </td>
        <td>{{ number_format($item->max_discount, 0, '.', '.') }}đ</td>
        <td>{{ $item->max_use }}</td>
        <td>
            @php
                $users = null;
                if ($item->users) {
                    $users = json_decode($item->users, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        $users = null;
                    }
                }
            @endphp
            @if ($users !== null)
                @foreach ($users as $user)
                    @php
                        $getUser = \App\Http\Controllers\Admin\VoucherController::getUser($user);
                    @endphp
                    @if ($getUser)
                        <p>{{ $getUser->name ?? $user }}</p>
                    @endif
                @endforeach
            @endif
        </td>
        <td>
            @php
                $products = null;
                if ($item->products) {
                    $products = json_decode($item->products, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        $products = null;
                    }
                }
            @endphp
            @if ($products !== null)
                @foreach ($products as $product)
                    @php
                        $getProduct = \App\Http\Controllers\Admin\VoucherController::getProduct($product);
                    @endphp
                    @if ($getProduct)
                        <p>{{ $getProduct->name ?? $product }}</p>
                    @endif
                @endforeach
            @endif
        </td>
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
<div class="px-4">
    {{ $results->links('pagination::bootstrap-5') }}
</div>
