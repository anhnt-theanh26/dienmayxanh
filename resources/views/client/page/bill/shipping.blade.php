@php
    $shipping = $bills->filter(function ($bill) {
        if ($bill->status == 'Shipping') {
            return $bill;
        }
    });
@endphp
@if (count($shipping) > 0)
    @foreach ($shipping as $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <a href="{{ isset($billItem->product->slug) ? route('product-detail', ['slug' => $billItem->product->slug]) : '#' }}"
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
                    <div class="">
                        <button class="btn btn-success" type="submit">Đã nhận hàng</button>
                        <button class="btn btn-danger" type="submit">Trả hàng</button>
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
            <div class="py-2">
                Chưa có đơn hàng
            </div>
        </div>
    </div>
@endif
