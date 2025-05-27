@php
    $waitconfirmation = $bills->filter(function ($bill) {
        return $bill->status == 1;
    });
@endphp
@if (count($waitconfirmation) > 0)
    @foreach ($waitconfirmation as $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <a href="{{ route('product-detail', ['slug' => $billItem->product->slug]) }}"
                        class="text-decoration-none text-black">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
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
                    @if ($bill->refund_reason == null)
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
                                                <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning text-white" data-bs-target="#cancel" data-bs-toggle="modal">
                                Yêu cầu hủy đơn hàng
                            </button>
                        </div>
                    @else
                        <div class="m-0 p-0">
                            <p class="m-0 p-0">
                                Đã gửi yêu cầu hủy đơn hàng
                            </p>
                            <p class="m-0 p-0">Lý do:
                                <span class="fw-bold">{{ $bill->refund_reason }}</span>
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
                            <p class="px-2">Thành tiền: </p>
                            <p class="text-danger px-1" style="font-size: 24px; font-weight: 500;">
                                {{ number_format($bill->total_amount, 0, '.', '.') ?? '' }} VNĐ
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
            <div class="">
                Chưa có đơn hàng
            </div>
        </div>
    </div>
@endif
