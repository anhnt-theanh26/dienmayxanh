@php
    $bannerheadertop = null;
    if ($bannermenus !== null) {
        $bannerMenu = $bannermenus->first();
        if ($bannerMenu?->bannermenus) {
            $bannerheadertop = $bannerMenu?->bannermenus?->first()?->bannermenuitems?->sortBy('location');
        }
    }
@endphp
@if ($bannerheadertop && $bannerheadertop->isNotEmpty())
    <section>
        <div style="background-color: rgb(57, 140, 239);">
            <div class="container">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="owl-carousel advertisement-00">
                        <div class="item">
                            <img class="rounded-2 object-fit-contain" src="{{ asset($bannerheadertop->first()->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var owl = $('.advertisement-00');
        owl.owlCarousel({
            autoplay: true,
            margin: 10,
            loop: true,
            slideBy: 2,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
@endif

<div class="" style="background-color: #2a83e9;">
    <div class="container">
        <div class="xs-menu-cont">
            <a id="menutoggle"><i class="fa fa-align-justify"></i> </a>
            <nav class="xs-menu displaynone">
                <ul>
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Team</a>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>

                </ul>
            </nav>
        </div>
        <nav class="menu py-1 pt-2">
            <ul style="margin: 0; padding: 0;">
                <a href="/OwlCarousel/dienmayxanh/">
                    <img width="229" height="40" class="object-fit-cover"
                        src="https://quocluat.vn/photos/portforlio/thuong-mai/dien-may-xanh/dien-may-xanh.jpg"
                        alt="">
                </a>
                <li class="drop-down">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-justify" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg> Danh mục
                    </a>

                    <div class="mega-menu fadeIn animated rounded-1">
                        <div class="mm-3column">
                            <span class="categories-list">
                                <ul>
                                    @foreach ($categoryparents as $categoryparent)
                                        <li class="menu-item border py-2" style="margin: 0 -10px; padding-left: 10px;">
                                            {{ $categoryparent->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </span>
                        </div>

                        @foreach ($categoryparents as $categoryparent)
                            <div class="mm-6column submenu" style="margin-left: -20px;">
                                <div class="row mx-2">
                                    <p style="margin-left: 10px;" class="fw-bold">
                                        {{ $categoryparent->name }}
                                    </p>
                                    @foreach ($categoryparent->categories as $category)
                                        <div class="col-2">
                                            <div class="submenu-content text-center">
                                                <a href="#">
                                                    <img src="{{ asset($category->image) }}" width="48"
                                                        height="48" alt="">
                                                </a>
                                                <h6 style="font-weight: normal; font-size: 12px;">
                                                    {{ $category->name }}
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <script>
                        const menuItems = document.querySelectorAll('.menu-item');
                        const submenus = document.querySelectorAll('.submenu');
                        menuItems.forEach((item, index) => {
                            item.addEventListener('mouseenter', function() {
                                submenus.forEach(submenu => submenu.style.display = 'none');
                                if (submenus[index]) {
                                    submenus[index].style.display = 'block';
                                }
                            });

                            item.addEventListener('mouseleave', function() {
                                if (submenus[index]) {
                                    submenus[index].style.display = 'none';
                                }
                            });
                        });
                        submenus.forEach(submenu => {
                            submenu.addEventListener('mouseenter', function() {
                                submenu.style.display = 'block';
                            });
                            submenu.addEventListener('mouseleave', function() {
                                submenu.style.display = 'none';
                            });
                        });
                    </script>
                </li>
                <li>
                    <form action="{{ route('search') }}" class="d-flex" role="search" method="post">
                        @csrf
                        <input style="width: 300px;" name="search" class="form-control me-2 rounded-pill"
                            type="search" placeholder="Bạn tìm gì..." aria-label="Search">
                    </form>
                </li>
                <li>
                    <a href="/OwlCarousel/dienmayxanh/dang-nhap.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        Đăng nhập
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        Giỏ hàng
                    </a>
                </li>
                <li>
                    <button style="width: 250px;" class="btn border text-white rounded-pill"
                        data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg> Địa chỉ nhận hàng
                    </button>
                    <div class="modal modal-lg fade text-black" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Chọn địa chỉ nhận
                                        hàng</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="m-0 p-0">Địa chỉ đang chọn: <span class="fw-bold"
                                            id="selectedAddress"></span></p>

                                    <div class="input-group mb-3 m-0 p-0">
                                        <input type="text" class="form-control" id="detailAddress"
                                            placeholder="Chi tiết chỗ ở..." aria-label="Username"
                                            aria-describedby="basic-addon1">
                                        <input type="hidden" name="allDressHiding" id="allDressHiding">
                                    </div>
                                    <div class="text-center m-0 p-0">
                                        <div class="m-0 p-0">Hoặc chọn</div>
                                    </div>
                                    <div class="css_select_div">
                                        <select class="css_select" id="tinh" name="tinh"
                                            title="Chọn Tỉnh Thành">
                                            <option value="0">Tỉnh Thành</option>
                                        </select>
                                        <select class="css_select" id="quan" name="quan"
                                            title="Chọn Quận Huyện">
                                            <option value="0">Quận Huyện</option>
                                        </select>
                                        <select class="css_select" id="phuong" name="phuong"
                                            title="Chọn Phường Xã">
                                            <option value="0">Phường Xã</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

@php
    $menufirst = null;
    if ($menus !== null) {
        $firstMenu = $menus?->first();
        if ($firstMenu?->menus) {
            $menufirst = $firstMenu?->menus?->first()?->menuitems?->sortBy('location');
        }
    }
@endphp
@if ($menufirst)
    <section>
        <div class="d-flex justify-content-center" style="background-color: #eaecf0;">
            <ul class="nav">
                @foreach ($menufirst?->take(10) as $menuitem)
                    <li class="nav-item">
                        <a class="nav-link text-primary" style="text-transform:lowercase;" aria-current="page"
                            href="#">{{ $menuitem?->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
