<section>
    <div class="bg-white">
        <div class="container" style="font-size: 15px; flex-shrink: 0; min-width: 1200px;">
            <div class="row p-2 pt-3">
                <div class="col-3">
                    <p class="fw-bold">Tổng đài hỗ trợ</p>
                    <p class="p-0 m-0 py-1">Gọi mua: <span><a class="text-decoration-none" href="">1900 232
                                461</a></span><span> (8:00 - 21:30)</span></p>
                    <p class="p-0 m-0 py-1">Khiếu nại: <span><a class="text-decoration-none"
                                href="">1800.1063</a></span><span> (8:00 - 21:30)</span></p>
                    <p class="p-0 m-0 py-1">Bảo hành: <span><a class="text-decoration-none" href="">1900 232
                                465</a></span><span> (8:00 - 21:00)</span></p>
                </div>
                <div class="col-5">
                    <div class="row">
                        @php
                            $menufooterfirst = null;
                            if (!empty($menus) && $menus !== null) {
                                $footerFirstMenu = $menus?->skip(2)?->first();
                                if ($footerFirstMenu?->menus) {
                                    $menufooterfirst = $footerFirstMenu?->menus?->first()?->menuitems?->sortBy('location');
                                }
                            }
                        @endphp
                        @if ($menufooterfirst && $menufooterfirst->isNotEmpty())
                            <div class="col-5">
                                <p class="fw-bold">{{ $footerFirstMenu?->menus?->first()->name }}</p>
                                @foreach ($menufooterfirst->take(5) as $menuitem)
                                    <p class="p-0 m-0 py-1"><a href="#" class="text-decoration-none text-black"
                                            style="text-transform:capitalize;">{{ $menuitem->name }}</a></p>
                                @endforeach
                                @if ($menufooterfirst?->count() > 5)
                                    <div class="collapse" id="seemore-one">
                                        @foreach ($menufooterfirst?->skip(5) as $menuitem)
                                            <p class="p-0 m-0 py-1"><a href="#"
                                                    class="text-decoration-none text-black"
                                                    style="text-transform:capitalize;">{{ $menuitem?->name }}</a></p>
                                        @endforeach
                                    </div>
                                    <p data-bs-toggle="collapse" href="#seemore-one" role="button"
                                        aria-expanded="false" aria-controls="seemore-one">
                                        Xem thêm
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </p>
                                @endif
                            </div>
                        @endif
                        @php
                            $menufootersecond = null;
                            if (!empty($menus) && $menus !== null) {
                                $footerSecondMenu = $menus?->skip(3)?->first();
                                if ($footerSecondMenu?->menus) {
                                    $menufootersecond = $footerSecondMenu?->menus?->first()?->menuitems?->sortBy('location');
                                }
                            }
                        @endphp
                        @if ($menufootersecond && $menufootersecond->isNotEmpty())
                            <div class="col-7">
                                <p class="fw-bold">{{ $footerSecondMenu?->menus?->first()->name }}</p>
                                @foreach ($menufootersecond->take(5) as $menuitem)
                                    <p class="p-0 m-0 py-1"><a href="#" class="text-decoration-none text-black"
                                            style="text-transform:capitalize;">{{ $menuitem?->name }}</a></p>
                                @endforeach
                                @if ($menufootersecond->count() > 5)
                                    <div class="collapse" id="seemore-two">
                                        @foreach ($menufootersecond->skip(5) as $menuitem)
                                            <p class="p-0 m-0 py-1"><a href="#"
                                                    class="text-decoration-none text-black"
                                                    style="text-transform:capitalize;">{{ $menuitem?->name }}</a></p>
                                        @endforeach
                                    </div>
                                    <p data-bs-toggle="collapse" href="#seemore-two" role="button"
                                        aria-expanded="false" aria-controls="seemore-two">
                                        Xem thêm
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <p class="">Website cùng tập đoàn</p>
                    <div class="row">
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://lh6.googleusercontent.com/jQXE325__my6TIcTVtoATgaQ_ZZvp-zHH0izCGQT5Obt-sdDaci5QQetrlo6qWcH8wnoQ2wdiM79uPA3g6ymd9jox-aex1g8OF5Sdk0ky_Q-vBvv81h103m2f7qKOyLOIH8cHjUH"
                                alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3" src="https://media.loveitopcdn.com/3807/logo-topzone-1.png"
                                alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://i.gyazo.com/abee143d233f7219637f727533c64d8c.png" alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://i.gyazo.com/abee143d233f7219637f727533c64d8c.png" alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://lh6.googleusercontent.com/jQXE325__my6TIcTVtoATgaQ_ZZvp-zHH0izCGQT5Obt-sdDaci5QQetrlo6qWcH8wnoQ2wdiM79uPA3g6ymd9jox-aex1g8OF5Sdk0ky_Q-vBvv81h103m2f7qKOyLOIH8cHjUH"
                                alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3" src="https://media.loveitopcdn.com/3807/logo-topzone-1.png"
                                alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://i.gyazo.com/abee143d233f7219637f727533c64d8c.png" alt="">
                        </div>
                        <div class="col-3 my-2">
                            <img class="img-fluid rounded-3"
                                src="https://i.gyazo.com/abee143d233f7219637f727533c64d8c.png" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-facebook text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                            <a href="">3886.8k Fan </a>
                        </div>
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-youtube text-danger" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>
                            <a href="">681k Đăng ký </a>
                        </div>
                        <div class="col-4">
                            <img width="16px"
                                src="https://cdnv2.tgdd.vn/webmwg/2024/ContentMwg/images/icon_zalo.png"
                                alt="">
                            <a href="">Zalo ĐMX</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container" style="flex-shrink: 0; min-width: 1200px;">
            <p class="py-4" style="font-size: 15px;">
                © 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày
                02/01/2007. GPMXH: 21/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 11/01/2021.
                Địa chỉ: 128 Trần Quang Khải, P.Tân Định, Q.1, TP.Hồ Chí Minh. Địa chỉ liên hệ và gửi chứng từ: Lô
                T2-1.2, Đường D1, Đ. D1, P.Tân Phú, TP.Thủ Đức, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email:
                cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt. Email:
                hotrotmdt@thegioididong.com. <a class="text-decoration-none" href="">Xem chính sách sử dụng</a>
            </p>
        </div>
    </div>
</section>
