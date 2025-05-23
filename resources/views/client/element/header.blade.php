@php
    $bannerheadertop = null;
    if (!empty($bannermenus) && $bannermenus !== null) {
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
        <nav class="menu py-1 pt-2">
            <ul style="margin: 0; padding: 0;" class="d-flex justify-content-between align-items-center">
                <a href="{{ route('index') }}">
                    <img width="229" height="40" class="object-fit-cover"
                        src="https://quocluat.vn/photos/portforlio/thuong-mai/dien-may-xanh/dien-may-xanh.jpg"
                        alt="">
                </a>
                <li class="drop-down" style="border: none">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-justify" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg> Danh mục
                    </a>
                    @if (!empty($categoryparents) && $categoryparents !== null)
                        <div class="mega-menu fadeIn animated rounded-1">
                            <div class="mm-3column">
                                <span class="categories-list">
                                    <ul>
                                        @foreach ($categoryparents as $categoryparent)
                                            <li class="menu-item border py-2"
                                                style="margin: 0 -10px; padding-left: 10px;">
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
                                                        <img src="{{ $category->image ? asset($category->image) : asset('storage/default.jpg') }}"
                                                            width="48" height="48" alt="">
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
                    @endif
                </li>
                {{-- <li>
                    <form action="{{ route('search') }}" class="d-flex" role="search" method="post">
                        @csrf
                        <input name="search" class="form-control me-2 rounded-pill input-search typeahead"
                            type="search" id="search" placeholder="Bạn tìm gì..." aria-label="Search">
                    </form>
                    <div class="preview-show-search position-absolute bg-white rounded shadow mt-1"
                        style="z-index: 1000; display: none;"></div>
                </li> --}}
                {{-- <li class="position-relative">
                    <form action="{{ route('search') }}" class="d-flex" role="search" method="post">
                        @csrf
                        <input name="search" class="form-control me-2 rounded-pill input-search typeahead"
                            type="search" id="search" placeholder="Bạn tìm gì..." aria-label="Search"
                            autocomplete="off">
                    </form>
                    <div class="preview-show-search position-absolute bg-white rounded shadow mt-1 w-100"
                        style="z-index: 1000; display: none;"></div>
                </li> --}}
                <style>
                    .search-item.active {
                        background-color: #e9ecef;
                        font-weight: 500;
                    }
                </style>
                <li>
                    <form action="{{ route('search') }}" class="d-flex" role="search" method="post">
                        @csrf
                        <input name="search" class="form-control me-2 rounded-pill input-search typeahead"
                            type="search" id="search" placeholder="Bạn tìm gì..." aria-label="Search"
                            autocomplete="off">
                    </form>
                    <div class="preview-show-search position-absolute bg-white rounded shadow mt-1"
                        style="z-index: 1000; display: none; max-width: 400px; width: 400px; max-height: 400px; overflow: auto;"></div>
                </li>

                @if (Auth::check())
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-light dropdown-toggle" style="border: none"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Tài khoản
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-black" href="#">Action</a></li>
                                <li><a class="dropdown-item text-black" href="#">Another action</a></li>
                                <li><a class="dropdown-item text-black" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-black" href="{{ route('logout') }}">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <a href="{{ route('login.form') }}">
                        <button type="button" class="btn btn-outline-light" style="border: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            Đăng nhập
                        </button>
                    </a>
                @endif
                <a href="{{ route('cart.index') }}" class="btn btn-outline-light position-relative"
                    style="border: none;">
                    <div style="position: relative; display: inline-block;">
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        {{-- <span class="badge rounded-pill bg-danger"
                            style="position: absolute; top: 0; right: 0; font-size: 0.6rem; transform: translate(30%, -30%);">
                            <span id="change-item-cart">
                                @if (Cart::count())
                                    {{ Cart::count() }}
                                @endif
                            </span>
                        </span> --}}
                        <span class="badge rounded-pill bg-danger" id="change-item-cart"
                            style="position: absolute; top: 0; right: 0; font-size: 0.6rem; transform: translate(30%, -30%);">
                            {{ Cart::count() }}
                        </span>
                    </div>
                    Giỏ hàng
                </a>
                <li>
                    <button class="btn border text-white rounded-pill" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">
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
                                    <p class="m-0 p-0">Địa chỉ đang chọn:
                                        <span class="fw-bold" id="selectedAddress">
                                            {{ Auth::user() ? Auth::user()->address : '' }}
                                        </span>
                                    </p>

                                    <div class="input-group mb-3 m-0 p-0">
                                        <input type="text" class="form-control" id="detailAddress"
                                            placeholder="Chi tiết chỗ ở..." aria-label="Username"
                                            aria-describedby="basic-addon1">

                                    </div>
                                    <div class="text-center m-0 p-0">
                                        <div class="m-0 p-0">Hoặc chọn</div>
                                    </div>
                                    <div class="css_select_div d-flex justify-content-center align-items-center">
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
                                        @if (Auth::check())
                                            <form action="{{ route('save-address') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="allDressHiding" id="allDressHiding"
                                                    value="{{ Auth::user()->address }}" required>
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </form>
                                        @endif
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
    if (!empty($menus) && $menus !== null) {
        $firstMenu = $menus?->first();
        if ($firstMenu?->menus) {
            $menufirst = $firstMenu?->menus?->first()?->menuitems?->sortBy('location');
        }
    }
@endphp

@if ($menufirst && $menufirst->isNotEmpty())
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

<script>
    $(document).ready(function() {
        const sampleData = [
            'iPhone 15 iPhone 15 iPhone 15 iPhone 15 iPhone 15 Pro',
            'iPhone 1iPhoneiPhone 15  15 5 Pro',
            'iPhone iPhone iPhone 15 15 15 Pro',
            'iPhone 1iPiPhone 15 hone 15 5 Pro',
            'iPhone 15iPhone 15 iPhone 15  Pro',
            'iPhone 1iPhone 15 5 Pro',
            'iPhoneiPhone 15  15 Pro',
            'iPhoniPhone 15 e 15 Pro',
            'iPhone 15 PiPhone 15 ro',
            'iPhone 15 iPhone 15 Pro',
            'Samsung Galaxy S23',
            'Xiaomi Redmi Note 13',
            'MacBook Air M2',
            'Apple Watch Series 9',
            'AirPods Pro',
            'Dell XPS 13',
            'Sony WH-1000XM5'
        ];

        const searchInput = $('#search');
        const resultBox = $('.preview-show-search');
        let currentFocus = -1;

        function renderSuggestions(filteredData) {
            resultBox.empty();
            filteredData.forEach(item => {
                resultBox.append(`
                    <div class="p-2 search-item border-bottom text-truncate" style="cursor: pointer;">
                        <p class="m-0 text-black">${item}</p>
                    </div>
                `);
            });
            resultBox.show();
        }

        function removeActive() {
            $('.search-item').removeClass('active bg-light');
        }

        function setActive(index) {
            removeActive();
            const items = $('.search-item');
            if (items.length && index >= 0 && index < items.length) {
                items.eq(index).addClass('active bg-light');
                searchInput.val(items.eq(index).text().trim());
            }
        }

        searchInput.on('input', function() {
            const query = $(this).val().toLowerCase();
            currentFocus = -1;

            if (query.length > 1) {
                const matches = sampleData.filter(item =>
                    item.toLowerCase().includes(query)
                );
                if (matches.length > 0) {
                    renderSuggestions(matches);
                } else {
                    resultBox.hide();
                }
            } else {
                resultBox.hide();
            }
        });

        searchInput.on('keydown', function(e) {
            let items = $('.search-item');

            if (e.keyCode === 40) {
                // ↓
                currentFocus++;
                if (currentFocus >= items.length) currentFocus = 0;
                setActive(currentFocus);
                e.preventDefault();
            } else if (e.keyCode === 38) {
                // ↑
                currentFocus--;
                if (currentFocus < 0) currentFocus = items.length - 1;
                setActive(currentFocus);
                e.preventDefault();
            } else if (e.keyCode === 13) {
                // Enter
                e.preventDefault();
                if (currentFocus > -1 && items.length > 0) {
                    searchInput.val(items.eq(currentFocus).text().trim());
                    resultBox.hide();
                } else {
                    $('form').submit(); // Không có gợi ý, submit form
                }
            }
        });

        $(document).on('click', '.search-item', function() {
            searchInput.val($(this).text().trim());
            resultBox.hide();
            $('form').submit()
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('.preview-show-search, #search').length) {
                resultBox.hide();
            }
        });
    });
</script>