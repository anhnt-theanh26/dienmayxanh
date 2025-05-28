@php
    $refund = $bills->filter(function ($bill) {
        if ($bill->status == 'Refund') {
            return $bill;
        }
    });
@endphp
@if (count($refund) > 0)
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
