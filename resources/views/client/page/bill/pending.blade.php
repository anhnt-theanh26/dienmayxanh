@php
    $pending = $bills->filter(function ($bill) {
        if ($bill->status == 'Pending' && $bill->payment_method == 'offline') {
            return $bill;
        }
    });
@endphp
@if (count($pending) > 0)
    @foreach ($pending as $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <a href="{{ isset($billItem->product->slug) ? route('product-detail', ['slug' => $billItem->product->slug]) : '#' }}"
                        class="text-decoration-none text-black">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex" style="width: 80%;">
                                <img src="{{ $billItem->image ? asset($billItem->image) : asset('./storage/default.jpg') }}"
                                    width="80" alt="">
                                <div class="px-2">
                                    <p class="p-0 m-0">
                                        {{ $billItem->name ?? '' }}
                                    </p>
                                    <p class="p-0 m-0 text-secondary" style="font-size: 14px">
                                        {{ $billItem->variant ?? '' }}
                                    </p>
                                    <p class="p-0 m-0">x{{ $billItem->quantity ?? '' }}</p>
                                </div>
                            </div>
                            <div style="font-weight: 500">
                                <span class="text-danger">
                                    {{ number_format($billItem->price, 0, '.', '.') ?? '' }} VNĐ
                                </span>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endforeach
                <div class="d-flex align-items-center justify-content-between">
                    @if ($bill->status_cancel == 'not_requested')
                        <div class="canceled" id="canceled">
                            <div class="modal fade" id="cancel" aria-hidden="true" aria-labelledby="cancelLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="cancelLabel"> Yêu cầu hủy đơn hàng </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('bill.cancel', ['id' => $bill->id]) }}"
                                                method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="reason" class="form-label">Lý do:</label>
                                                    <input type="text" class="form-control" name="reason"
                                                        id="reason" placeholder="Lý do hủy đơn hàng..." required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Gửi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning text-white" data-bs-target="#cancel" data-bs-toggle="modal">
                                Yêu cầu hủy đơn hàng
                            </button>
                        </div>
                    @elseif ($bill->status_cancel == 'requested')
                        <div class="m-0 p-0" style="width: 60%;">
                            <p class="m-0 p-0">
                                Đã gửi yêu cầu hủy đơn hàng
                            </p>
                            <p class="m-0 p-0">Lý do:
                                <span class="fw-bold">{{ $bill->reason_cancel }}</span>
                            </p>
                        </div>
                    @elseif ($bill->status_cancel == 'rejected')
                        <div class="m-0 p-0" style="width: 60%;">
                            <p class="m-0 p-0">
                                Đã gửi yêu cầu hủy đơn hàng
                            </p>
                            <p class="m-0 p-0">Lý do:
                                <span class="fw-bold">{{ $bill->reason_cancel }}</span>
                            </p>
                            <p class="m-0 badge text-bg-warning text-white">
                                Đơn hàng không được chấp nhận hủy
                            </p>
                        </div>
                    @endif
                    <div class="">
                        @if ($bill->discount > 0)
                            <div class="d-flex align-items-center justify-content-end m-0 p-0">
                                <p class="px-2 m-0 p-0">Giảm giá: </p>
                                <p class="text-decoration-line-through text-danger m-0 p-0"
                                    style="font-size: 20px; font-weight: 500;">
                                    {{ number_format($bill->discount, 0, '.', '.') ?? '' }} VNĐ
                                </p>
                            </div>
                        @endif
                        <div class="d-flex align-items-center justify-content-end m-0 p-0">
                            <p class="px-2 m-0 p-0">Thành tiền: </p>
                            <p class="text-danger px-1 m-0 p-0" style="font-size: 24px; font-weight: 500;">
                                {{ number_format($bill->total_amount, 0, '.', '.') ?? '' }} VNĐ
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end m-0 p-0">
                            <p class="px-2 m-0 p-0">Code: </p>
                            <p class="text-danger m-0 p-0">
                                {{ $bill->code }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="d-flex align-items-center justify-content-center" style="min-height: 600px">
        <div class="">
            <div class="d-flex align-items-center justify-content-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png" width="100px" alt="">
            </div>
            <div class="py-2">
                Chưa có đơn hàng
            </div>
        </div>
    </div>
@endif
