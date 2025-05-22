@extends('layout.client')

@section('title', 'Giỏ hàng')

@section('content')
    @if (Cart::count() > 0)
        <section>
            <div class="py-4">
                <div class="container d-flex justify-content-center">
                    <div class="cart-list" id="cart-list">
                        <div style="width: 600px;">
                            <div class="bg-white rounded-top-3 p-3 border">
                                <div class="d-grid gap-2">
                                    @include('client.page.cart.address-delivery')
                                    @include('client.page.cart.product-list')
                                </div>
                            </div>
                            @include('client.page.cart.delivery-information')
                            @include('client.page.cart.voucher')
                            @include('client.page.cart.payment')
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @else
        <section>
            <div class="py-4">
                <div class="container d-flex justify-content-center">
                    <div class="cart-list" id="cart-list">
                        <div class="container d-flex justify-content-center align-items-center">
                            <div class="d-flex flex-column mb-3 text-center" style="width: 600px;">
                                <div class="pt-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200"
                                        fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path
                                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </div>
                                <h5 class="py-2">Giỏ hàng trống</h5>
                                <p class="py-2">Không có sản phẩm nào trong giỏ hàng</p>
                                <div class="d-grid gap-2 py-2">
                                    <a class="btn btn-primary fw-bold" href="{{ route('index') }}">Về trang chủ</a>
                                </div>
                                <p class="py-2">
                                    Khi cần trợ giúp vui lòng gọi 1900 232 461 hoặc 028.3948.6789 (8h00 - 21h30)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif

    @include('client.page.cart.script')
@endsection
