@php
    $canceled = $bills->filter(function ($bill) {
        if ($bill->status == 'Cancelled' || $bill->status == 'Returned') {
            return $bill;
        }
    });
@endphp
@if (count($canceled) > 0)
    @foreach ($canceled as $index => $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <a href="{{ isset($billItem->product->slug) ? route('product.show', [$billItem->product->slug, $billItem->product->id]) : '#' }}"
                        class="text-decoration-none text-black">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex" style="width: 80%;">
                                <img class="object-fit-contain"
                                    src="{{ $billItem->image ? asset($billItem->image) : asset('./storage/default.jpg') }}"
                                    width="80" alt="{{ $bill->code }}">
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
                    <div class="" style="width: 60%;">
                        <p class="m-0 p-0">Lý do:
                            <span class="fw-bold">{{ $bill->reason_cancel }}</span>
                        </p>
                        @if ($bill->payment_method == 'online' && $bill->refund_status == null && $bill->payment_status == 'Paid')
                            <div class="canceled" id="canceled">
                                <div class="modal fade" id="refund" aria-hidden="true" aria-labelledby="refundLabel"
                                    tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="refundLabel"> Yêu cầu hoàn tiền
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('bill.refund', ['id' => $bill->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="reason" class="form-label">Lý do:</label>
                                                        <input type="text" class="form-control" name="reason"
                                                            id="reason" placeholder="Lý do hoàn tiền..." required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-success" data-bs-target="#refund" data-bs-toggle="modal">
                                    Yêu cầu hoàn tiền
                                </button>
                            </div>
                        @endif
                        @if ($bill->payment_method == 'online' && $bill->refund_status != null)
                            <p class="m-0 p-0">
                                Đã gửi yêu cầu hoàn tiền
                            </p>
                            <p class="m-0 p-0">Lý do:
                                <span class="fw-bold">{{ $bill->refund_reason }}</span>
                            </p>
                            <p class="m-0 p-0">Trạng thái:
                                <span class="fw-bold">
                                    @if ($bill->refund_status == 'Pending')
                                        <span class="fw-bold">{{ $bill->refund_status }}(đang sử lý)</span>
                                    @endif
                                    @if ($bill->refund_status == 'Success')
                                        <span class="fw-bold">{{ $bill->refund_status }}(đã sử lý)</span>
                                    @endif
                                    @if ($bill->refund_status == 'Failed')
                                        <span class="fw-bold">{{ $bill->refund_status }}(lý do không được chấp
                                            nhận)</span>
                                    @endif
                                </span>
                            </p>
                        @endif
                    </div>
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
