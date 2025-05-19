@extends('layout.client')

@section('title', 'Giỏ hàng')

@section('content')
    <section>
        <div class="py-4">
            <div class="container d-flex justify-content-center">
                <div class="">
                    <div class="bg-white rounded-top-3 p-3 border" style="width: 750px;">
                        <div class="d-grid gap-2">
                            <div class="rounded-2 p-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                style="border: 1px dashed #2a83e9; background-color: rgb(241, 248, 254);">
                                <p class="text-primary" style="color: rgb(59, 130, 246)">
                                    Vui lòng cung cập thông tin nhận hàng
                                </p>
                                <p class="m-0 p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-geo-alt text-danger" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    {{ Auth::user() ? Auth::user()->address : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="product-list pt-4">
                            <div class="product-item d-flex py-3">
                                <div class="product-img" style="width: 15%;">
                                    <img width="100%" class="object-fit-contain"
                                        src="https://cdn.tgdd.vn/Products/Images/166/304180/tu-dong-hoa-phat-783-lit-hpf-ad6783-200x200.jpg"
                                        alt="">
                                </div>
                                <div class="product-content px-2" style="width: 85%;">
                                    <div class="product-content-name d-flex justify-content-between">
                                        <div class="product-content-name-left" style="max-width: 75%;">
                                            <a class="text-decoration-none text-black"
                                                href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                            </a>
                                        </div>
                                        <div class="product-content-name-left" style="max-width: 25%;">
                                            <p class="text-danger">12.600.000đ</p>
                                        </div>
                                    </div>
                                    <div class="product-content-variant py-1 pt-2">
                                        <p class="bg-light p-2 rounded-2" style="width: fit-content;">Màu trắng</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="px-3">
                                            <a class="text-decoration-none text-secondary" href="">Xóa</a>
                                        </div>
                                        <div>
                                            <input type="button" value="-" class="qty-minus">
                                            <input type="number" value="1" class="qty" min="1"
                                                max="5">
                                            <input type="button" value="+" class="qty-plus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="product-item d-flex py-3">
                                <div class="product-img" style="width: 15%;">
                                    <img width="100%" class="object-fit-contain"
                                        src="https://cdn.tgdd.vn/Products/Images/166/304180/tu-dong-hoa-phat-783-lit-hpf-ad6783-200x200.jpg"
                                        alt="">
                                </div>
                                <div class="product-content px-2" style="width: 85%;">
                                    <div class="product-content-name d-flex justify-content-between">
                                        <div class="product-content-name-left" style="max-width: 75%;">
                                            <a class="text-decoration-none text-black"
                                                href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                            </a>
                                        </div>
                                        <div class="product-content-name-left" style="max-width: 25%;">
                                            <p class="text-danger">12.600.000đ</p>
                                        </div>
                                    </div>
                                    <div class="product-content-variant py-1 pt-2">
                                        <p class="bg-light p-2 rounded-2" style="width: fit-content;">Màu trắng</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="px-3">
                                            <a class="text-decoration-none text-secondary" href="">Xóa</a>
                                        </div>
                                        <div>
                                            <input type="button" value="-" class="qty-minus">
                                            <input type="number" value="1" class="qty" min="1"
                                                max="5">
                                            <input type="button" value="+" class="qty-plus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="product-item d-flex py-3">
                                <div class="product-img" style="width: 15%;">
                                    <img width="100%" class="object-fit-contain"
                                        src="https://cdn.tgdd.vn/Products/Images/166/304180/tu-dong-hoa-phat-783-lit-hpf-ad6783-200x200.jpg"
                                        alt="">
                                </div>
                                <div class="product-content px-2" style="width: 85%;">
                                    <div class="product-content-name d-flex justify-content-between">
                                        <div class="product-content-name-left" style="max-width: 75%;">
                                            <a class="text-decoration-none text-black"
                                                href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                                Loa karaoke xách tay Sumico Hexagon 150W
                                            </a>
                                        </div>
                                        <div class="product-content-name-left" style="max-width: 25%;">
                                            <p class="text-danger">12.600.000đ</p>
                                        </div>
                                    </div>
                                    <div class="product-content-variant py-1 pt-2">
                                        <p class="bg-light p-2 rounded-2" style="width: fit-content;">Màu trắng</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="px-3">
                                            <a class="text-decoration-none text-secondary" href="">Xóa</a>
                                        </div>
                                        <div>
                                            <input type="button" value="-" class="qty-minus">
                                            <input type="number" value="1" class="qty" min="1"
                                                max="5">
                                            <input type="button" value="+" class="qty-plus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="summary">
                            <div class="d-flex justify-content-between">
                                <p>
                                    Tạm tính (6 sản phẩm):
                                </p>
                                <p>
                                    2.260.000đ
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-3 border mt-2" style="width: 750px;">
                        <p class="fw-bold">Thông tin nhận hàng:</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex">
                                <div class="product-img" style="width: 10%;">
                                    <img width="100%" class="object-fit-contain"
                                        src="https://cdn.tgdd.vn/Products/Images/1992/268451/dung-senko-dts1609-290823-033918-200x200.jpg"
                                        alt="">
                                </div>
                                <div class="px-2" style="width: 90%;">
                                    <a class="text-decoration-none text-black"
                                        href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                        Loa karaoke xách tay Sumico Hexagon 150W
                                        Loa karaoke xách tay Sumico Hexagon 150W
                                    </a>
                                    <div class="">
                                        <p class="text-secondary" style="padding-right: 20px; float: left;">
                                            Màu: Xám - đồng
                                        </p>
                                        <p class="text-secondary" style="padding-right: 20px; float: left;">
                                            SL: 2
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="product-img" style="width: 10%;">
                                    <img width="100%" class="object-fit-contain"
                                        src="https://cdn.tgdd.vn/Products/Images/1992/268452/lung-senko-l1638-290823-034304-200x200.jpg"
                                        alt="">
                                </div>
                                <div class="px-2" style="width: 90%;">
                                    <a class="text-decoration-none text-black"
                                        href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                        Loa karaoke xách tay Sumico Hexagon 150W
                                        Loa karaoke xách tay Sumico Hexagon 150W
                                    </a>
                                    <div class="">
                                        <p class="text-secondary" style="padding-right: 20px; float: left;">
                                            Màu: Xám - đồng
                                        </p>
                                        <p class="text-secondary" style="padding-right: 20px; float: left;">
                                            SL: 2
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-3 border mt-2" style="width: 750px;">
                        <div class="accordion" id="voucher">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#voucher-sale" aria-expanded="false"
                                        aria-controls="voucher-sale">
                                        Sử dụng mã giảm giá
                                    </button>
                                </h2>
                                <div id="voucher-sale" class="accordion-collapse collapse" data-bs-parent="#voucher">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            style="max-width: 80%;" aria-label="Search" />
                                        <button class="btn btn-outline-success" type="submit" style="max-width: 20%;">Áp
                                            dụng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">
                                Tổng tiền
                            </p>
                            <p class="fw-bold">
                                2.260.000đ
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-3 border mt-2" style="width: 750px;">
                        <p class="fw-bold">Hình thức thanh toán:</p>
                        <div class="form-check py-1">
                            <input class="form-check-input payment-methods" type="radio" name="payment"
                                value="offline" id="offline" checked>
                            <label class="form-check-label" for="offline">
                                Thanh toán tiền mặt khi nhận hàng
                            </label>
                        </div>
                        <div class="form-check py-1">
                            <input class="form-check-input payment-methods" type="radio" name="payment" value="online"
                                id="online">
                            <label class="form-check-label" for="online">
                                Chuyển khoản ngân hàng
                            </label>
                        </div>
                        <p class="m-0 p-0 py-1">Chính sách bảo mật:</p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input agree" id="policy" checked>
                            <label class="form-check-label" for="policy">Tôi đồng ý với
                                <a target="_blank" href="https://www.dienmayxanh.com/chinh-sach-xu-ly-du-lieu-ca-nhan"
                                    class="text-decoration-none">Chính sách xử lý dữ liệu cá
                                    nhân</a>
                                của Điện Máy Xanh</label>
                        </div>
                        <div class="d-grid gap-2 py-2 pt-3">
                            <button class="btn btn-order-product text-white" type="submit"
                                style="background-color: rgb(252, 118, 0)">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script></script>
@endsection
