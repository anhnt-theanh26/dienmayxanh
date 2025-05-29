@php
    $waitpayment = $bills->filter(function ($bill) {
        if (
            $bill->payment_status == 'Payment Failed' &&
            $bill->expiry_time >= now() &&
            $bill->payment_method == 'online'
        ) {
            return $bill;
        }
    });
@endphp
@if (count($waitpayment) > 0)
    @foreach ($waitpayment as $index => $bill)
        <div class="mt-2 border">
            <div class="p-3 pt-4 bg-white">
                @foreach ($bill->billItems as $billItem)
                    <a href="{{ isset($billItem->product->slug) ? route('product-detail', ['slug' => $billItem->product->slug]) : '#' }}"
                        class="text-decoration-none text-black">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <img class="object-fit-contain"
                                    src="{{ $billItem->image ? asset($billItem->image) : asset('./storage/default.jpg') }}"
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
                        <div class="m-0 p-0">
                            <p class="m-0 p-0">
                                Hết hạn thanh toán sau:
                                <span class="fw-bold">
                                    <span id="countdown_{{ $index }}"></span>
                                    <input type="hidden" class="datetime" name="datetime"
                                        id="datetime_{{ $index }}" value="{{ $bill->expiry_time }}">
                                </span>
                            </p>
                            <p class="m-0 p-0">
                                <a class="btn btn-outline-primary continue-payment-{{ $index }}"
                                    href="{{ route('order.continue_payment', ['id' => $bill->id]) }}"
                                    role="button">Tiếp tục thanh toán</a>
                            </p>
                        </div>

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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let timeElements = document.querySelectorAll('.datetime');

        timeElements.forEach(element => {
            let expiryTime = new Date(element.value);
            let countdownElement = document.getElementById(`countdown_${element.id.split('_').pop()}`);

            function updateCountdown() {
                let currentTime = new Date();
                let timeLeft = expiryTime - currentTime;
                if (timeLeft <= 0) {
                    countdownElement.innerHTML = "Đã hết thời gian!";
                    clearInterval(interval);
                    document.querySelector(`.continue-payment-${element.id.split('_').pop()}`).remove();
                } else {
                    let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    countdownElement.innerHTML = `${minutes} : ${seconds}`;
                }
            }
            let interval = setInterval(updateCountdown, 1000);
        });
    });
</script>
