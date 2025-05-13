<div class="col-5">
    <div class="bg-white rounded-3 p-3">
        <div class="banner-product">
            <div class="">
                <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Banner/02/7f/027fb856d68f57e97cfd9609de5db316.png"
                    class="img-fluid" alt="">
            </div>
            <div class="py-3">
                <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Banner/dd/8a/dd8a37d9855f30485074745c5bf29db4.png"
                    class="img-fluid" alt="">
            </div>
        </div>
        <div class="product">
            <div id="nav-tab" role="tablist">
                @foreach ($product->variants as $variant)
                    <button class="btn btn-outline-primary {{ $loop->first ? 'active' : '' }}"
                        id="product-variant-{{ $variant->id }}-tab" data-bs-toggle="tab"
                        data-bs-target="#product-variant-{{ $variant->id }}" type="button" role="tab"
                        aria-controls="product-variant-{{ $variant->id }}" aria-selected="true">
                        {{ $variant->name }}
                    </button>
                @endforeach
            </div>
            <div class="tab-content" id="nav-tabContent">
                @foreach ($product->variants as $variant)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                        id="product-variant-{{ $variant->id }}" role="tabpanel"
                        aria-labelledby="product-variant-{{ $variant->id }}-tab">
                        <div class="d-flex align-items-center py-2">
                            <h5 class="fw-bold text-danger">
                                {{ number_format($variant->price, 0, '.', '.') }}₫
                            </h5>
                            <h6 class="text-decoration-line-through text-body-tertiary px-3">
                                {{ number_format($variant->price_old, 0, '.', '.') }}₫
                            </h6>
                            @if (round((($variant->price_old - $variant->price) / $variant->price_old) * 100) > 0)
                                <h5 class="text-danger" style="font-weight: normal;">
                                    -{{ round((($variant->price_old - $variant->price) / $variant->price_old) * 100) }}%
                                </h5>
                            @endif
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item bg-light">
                                <h6 class="p-0 m-0">Khuyến mãi</h6>
                                <p class="text-body-tertiary p-0 m-0" style="font-size: 12px;">Giá và khuyến
                                    mãi dự kiến áp dụng đến 23:59 | 30/04</p>
                            </li>
                            <li class="list-group-item">
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-1-circle-fill text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <span style="font-size: 14px;">Tặng Phiếu mua hàng nồi cơm trị giá
                                            100.000đ</span>
                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-2-circle-fill text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <span style="font-size: 14px;">Tặng Phiếu mua hàng quạt điện trị giá
                                            100.000đ (trừ quạt
                                            bàn/sàn/sạc/hộp)</span>
                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-3-circle-fill text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <span style="font-size: 14px;">Phiếu mua hàng máy lọc nước trị giá
                                            300.000đ</span>
                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-4-circle-fill text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M7.519 5.057c-.886 1.418-1.772 2.838-2.542 4.265v1.12H8.85V12h1.26v-1.559h1.007V9.334H10.11V4.002H8.176zM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <span style="font-size: 14px;">Phiếu mua hàng đồng hồ định vị trẻ em
                                            hãng Kidcare, imoo, Huawei trị giá 200,000đ</span>
                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-5-circle-fill text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8.006 4.158c1.74 0 2.924-1.119 2.924-2.806 0-1.641-1.178-2.584-2.56-2.584-.897 0-1.442.421-1.612.68h-.064l.193-2.344h3.621V4.002H5.791L5.445 8.63h1.149c.193-.358.668-.809 1.435-.809.85 0 1.582.604 1.582 1.57 0 1.085-.779 1.682-1.57 1.682-.697 0-1.389-.31-1.53-1.031H5.276c.065 1.213 1.149 2.115 2.72 2.115Z" />
                                        </svg>
                                    </div>
                                    <div class="col-11">
                                        <span style="font-size: 14px;">Nhập mã VNPAYTGDD2 giảm từ 80,000đ
                                            đến 150,000đ (áp dụng tùy giá trị đơn hàng) khi thanh toán qua
                                            VNPAY-QR <a class="text-decoration-none" href="">(Xem chi tiết
                                                tại đây)</a></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <span>
                                <a style="font-size: 14px;" class="text-decoration-none" href="">Chọn địa
                                    chỉ nhận hàng để biết thời
                                    gian giao.</a>
                            </span>
                        </div>
                        <hr class="m-0 p-0">
                        <div class="py-3">
                            <span style="font-size: 14px;" class="fw-bold">+11.980</span>
                            <span style="font-size: 14px;">
                                điểm tích lũy Quà Tặng VIP ?
                            </span>
                        </div>
                        <div class="d-grid gap-2 d-flex">
                            <button class="btn btn-outline-primary w-50" type="button">
                                <div class="py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                    <h6 style="font-size: 12px;" class="m-0 p-0">
                                        Thêm vào giỏ hàng</h6>
                                </div>
                            </button>
                            <button class="btn btn-warning w-50" type="button">
                                <div class="py-1">
                                    <h6 style="font-size: 12px;" class="m-0 p-0 text-white">Mua ngay</h6>
                                </div>
                            </button>
                        </div>
                        <div class="d-grid gap-2 d-flex py-2">
                            <button class="btn btn-primary w-50" type="button">
                                <div class="py-1">
                                    <h6 style="font-size: 12px;" class="m-0 p-0">Mua trả trậm</h6>
                                </div>
                            </button>
                            <button class="btn btn-primary w-50" type="button">
                                <div class="py-1">
                                    <h6 style="font-size: 12px;" class="m-0 p-0">Trả trậm qua thẻ</h6>
                                    <p style="font-size: 12px;" class="m-0 p-0 text-white">Visa, Mastercard,
                                        JCB, Amex</p>
                                </div>
                            </button>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg>
                            <span>
                                Gọi đặt mua
                                <a style="font-size: 14px;" class="text-decoration-none" href="">1900 232
                                    461</a>
                                (8:00 - 21:30)
                            </span>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                <path
                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                            </svg>
                            <a style="font-size: 14px;" class="text-decoration-none" href="">Xem siêu thị có
                                hàng trưng bày</a>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white rounded-3 mt-3 p-3 hiding-product-recent">
        <div class="d-flex justify-content-between">
            <h6>Sản phẩm đã xem</h6>
            <button class="btn btn-ouline-white btn-close-product-recent" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </button>
        </div>
        <div class="">
            <div class="owl-carousel product-recent">
                <div class="item row">
                    <div class="col-12 my-2">
                        <div class="p-2 m-2 border rounded-2 d-flex" style="min-height: 80px;">
                            <div class="d-flex align-items-center" style="width: 50px; height: auto;">
                                <img style="width: 50px;"
                                    src="https://cdn.tgdd.vn/Products/Images/2002/307168/tcl-inverter-15-hp-tac-13csd-xab1i-550x160.jpg"
                                    alt="">
                            </div>
                            <div class="title">
                                <p class="m-0 p-0" style="font-size: 14px;">TCL Inverter 1.5 HP
                                    TAC-13CSD/XAB1I</p>
                                <h6 class="text-danger m-0 p-0">7.290.000₫</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="col-12 my-2">
                        <div class="p-2 m-2 border rounded-2 d-flex" style="min-height: 80px;">
                            <div class="d-flex align-items-center" style="width: 50px; height: auto;">
                                <img style="width: 50px;"
                                    src="https://cdn.tgdd.vn/Products/Images/2002/307168/tcl-inverter-15-hp-tac-13csd-xab1i-550x160.jpg"
                                    alt="">
                            </div>
                            <div class="title mx-2">
                                <p class="m-0 p-0" style="font-size: 14px;">Tivi sonic 50 </p>
                                <h6 class="text-danger m-0 p-0">8.999.000₫</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="col-12 my-2">
                        <div class="p-2 m-2 border rounded-2 d-flex" style="min-height: 80px;">
                            <div class="d-flex align-items-center" style="width: 50px; height: auto;">
                                <img style="width: 50px;"
                                    src="https://cdn.tgdd.vn/Products/Images/2002/307168/tcl-inverter-15-hp-tac-13csd-xab1i-550x160.jpg"
                                    alt="">
                            </div>
                            <div class="title">
                                <p class="m-0 p-0" style="font-size: 14px;">Máy giặt ngang Panasonic</p>
                                <h6 class="text-danger m-0 p-0">9.990.000₫</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var owl = $('.product-recent');
                owl.owlCarousel({
                    margin: 10,
                    loop: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 2
                        }
                    }
                })
                $('.btn-close-product-recent').click(function() {
                    var hidingProductRecent = document.querySelector('.hiding-product-recent');
                    hidingProductRecent.style.display = 'none';
                })
            </script>

        </div>
    </div>
</div>
