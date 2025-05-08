@php
    $productmenuitemthird = null;
    $productmenuitemthirddata = [];
    if ($productmenus !== null) {
        $thirdProductMenu = $productmenus?->skip(2)?->first();
        if ($thirdProductMenu?->productmenus) {
            $productmenuitemthird = $thirdProductMenu?->productmenus?->first()?->productmenuitems?->sortBy('location');
        }
        if ($productmenuitemthird) {
            foreach ($productmenuitemthird as $categories) {
                foreach ($categories?->category?->products as $product) {
                    $productmenuitemthirddata[] = $product;
                }
            }
        }
    }
@endphp


<section>
    <div class="container mt-5">
        <div class="bg-white rounded-4 p-3">
            <h4 class="fw-bold">#CHỦ ĐỀ</h4>
            <ul class="nav d-flex nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 active" id="topic-sale-tab" data-bs-toggle="tab"
                        data-bs-target="#topic-sale" type="button" role="tab" aria-controls="topic-sale"
                        aria-selected="true">
                        Khuyến mãi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="topic-social-tab" data-bs-toggle="tab"
                        data-bs-target="#topic-social" type="button" role="tab" aria-controls="topic-social"
                        aria-selected="false">
                        Mạng xã hội Điện máy XANH
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="topic-sale" role="tabpanel" aria-labelledby="topic-sale-tab">
                    <div class="owl-carousel pt-2">
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/535881/huong-dan-ve-sinh-quat-dung-thuong638792899444899802.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>6 bước vệ sinh quạt đứng, quạt treo tường đúng cách, đơn giản tại nhà</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/1336367/thuong-hieu-quat-dieu-hoa-pho-bien-tren-thi-tru638778273047110558.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Nên mua quạt điều hòa hãng nào? Top 10 hãng quạt điều hòa tốt nhất</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/604330/may%20lanh%20panasonic%20c%E1%BB%A7a%20nuoc%20nao638772201558690305.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Máy lạnh Panasonic của nước nào? Có tốt không?</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/1575742/nakagawa-dac-quyen638772142526055642.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Lễ ký kết đặc quyền dòng máy lạnh Nagakawa tại Điện máy XANH 03/2025</p>
                            </div>
                        </div>
                    </div>
                    <script>
                        var owl = $('.owl-carousel');
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
                                    items: 4
                                }
                            }
                        })
                    </script>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0"
                                    href=""> Xem thêm khuyến mãi</a>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="topic-social" role="tabpanel" aria-labelledby="topic-social-tab">
                    <div class="owl-carousel pt-2">
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/mutosi-nuoc-khoe-chuan-nhat-dat-som-deal-chat638792735343513089.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>MUTOSI NƯỚC KHỎE CHUẨN NHẬT - ĐẶT SỚM, DEAL CHẤT! Giảm đến 28%, giá chỉ từ
                                    4.290.000đ - Đặt trước ngay!</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/1573705/VNPAYTGDD2-%20site%20TGD%C4%90%20-%20DMX638792005007776121.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Ưu đãi hấp dẫn khi thanh toán bằng VNPAY tại Điện máy XANH tháng 04/2025</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/1576459/dien-may-xanh-tung-deal-cuc-nong-giam-den-1-500638792000185365181.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Điện máy XANH TUNG DEAL CỰC NÓNG: Giảm Đến 1.500.000Đ Qua App Quà Tặng VIP - Mua
                                    Máy Lạnh hè này ngay để nhận ưu đãi</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img class="img-fluid rounded-3"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/News/Thumb/1553715/le-hoi-gia-re-qua-thumb638791849392609421.jpg"
                                    alt="">
                            </div>
                            <div class="pt-1 title">
                                <p>Sale To - Giá Rẻ! 17h ngày 05/04 Cơ hội trúng Tủ lạnh 45L/Quạt điện trị giá tới
                                    2.79 triệu, mua Chảo nhôm đáy từ 20cm chỉ 30K</p>
                            </div>
                        </div>
                    </div>
                    <script>
                        var owl = $('.owl-carousel');
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
                                    items: 4
                                }
                            }
                        })
                    </script>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0"
                                    href="">Xem thêm social</a>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
