<!-- khuyến mãi online  -->
@php
    $productmenuitemfirst = $productmenus->first()->productmenus->first()->productmenuitems;
@endphp
<section>
    <div class="container">
        <h4 class="fw-bold py-4">Khuyến mãi Online</h4>
        <div class="bg-white rounded-4 p-3">
            <ul class="nav d-flex nav-tabs  d-flex align-items-center justify-content-between" id="myTab"
                role="tablist">
                @foreach ($productmenuitemfirst as $index => $item)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2 {{ $loop->first ? 'active' : '' }}" id="tab-{{ $index }}"
                            data-bs-toggle="tab" data-bs-target="#tab-content-{{ $index }}" type="button"
                            role="tab" aria-controls="tab-content-{{ $index }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            <img style="width: 100px; height: 40px;" src="{{ $item->category->image }}" alt="">
                        </button>
                    </li>
                @endforeach

                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 active" id="1-tab" data-bs-toggle="tab" data-bs-target="#1"
                        type="button" role="tab" aria-controls="1" aria-selected="true">
                        <img width="100px" width="40px"
                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/a2/e9/a2e96842d59456f897836eea3d43eaee.png"
                            alt="">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="2-tab" data-bs-toggle="tab" data-bs-target="#2" type="button"
                        role="tab" aria-controls="2" aria-selected="false">
                        <img width="100px"
                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/e8/76/e8766f687ebabec71b868bb6f78cca7b.png"
                            alt="">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="3-tab" data-bs-toggle="tab" data-bs-target="#3" type="button"
                        role="tab" aria-controls="3" aria-selected="false">
                        <img width="100px"
                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/33/9a/339ad8b2e912a5918c4aef7d5eca368d.png"
                            alt="">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="4-tab" data-bs-toggle="tab" data-bs-target="#4" type="button"
                        role="tab" aria-controls="4" aria-selected="false">
                        <img width="100px"
                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/0e/ed/0eedbce1c98c64fa38281ef0327ca806.png"
                            alt="">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="5-tab" data-bs-toggle="tab" data-bs-target="#5" type="button"
                        role="tab" aria-controls="5" aria-selected="false">
                        <p class="">
                            Quạt mát
                        </p>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="6-tab" data-bs-toggle="tab" data-bs-target="#6" type="button"
                        role="tab" aria-controls="6" aria-selected="false">
                        <p class="">
                            Máy giặt
                        </p>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="7-tab" data-bs-toggle="tab" data-bs-target="#7" type="button"
                        role="tab" aria-controls="7" aria-selected="false">
                        <p class="">
                            Máy lọc nước
                        </p>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="8-tab" data-bs-toggle="tab" data-bs-target="#8" type="button"
                        role="tab" aria-controls="8" aria-selected="false">
                        <p class="">
                            Nồi cơm
                        </p>
                    </button>
                </li> --}}
            </ul>
            <img class="img-fluid p-4"
                src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/a9/7f/a97f59eed78c14dbb0943f03607b49d5.png"
                alt="">
            <div class="tab-content" id="myTabContent">
                @foreach ($productmenuitemfirst as $index => $categories)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                        id="tab-content-{{ $index }}" role="tabpanel" aria-labelledby="tab-{{ $index }}">
                        <div class="row">
                            @foreach ($categories->category->products as $product)
                                <div class="col-2 my-2">
                                    <a href="#" class="text-decoration-none text-black">
                                        <div class="p-3 m-2 border rounded-2"
                                            style="min-height: 450px; max-height: 450px;">
                                            <p class="bg-secondary-subtle rounded-1 px-1"
                                                style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                            <img src="{{ $product->image }}" class="card-img-top rounded-2"
                                                alt="{{ $product->name }}">
                                            <div>
                                                <p class="card-text m-0 p-0 py-2">{{ $product->name }}</p>
                                                <p class="card-title m-0 p-0 py-1 fw-bold text-danger"
                                                    style="font-size: 18px;">
                                                    {{ $product->variants->first()->price }}₫
                                                </p>
                                                <p class="m-0 p-0 py-1">
                                                    <span class="card-title m-0 p-0 text-decoration-line-through"
                                                        style="font-size: 14px;">49.990.000₫</span>
                                                    <span class="text-danger">-31%</span>
                                                </p>
                                                <p class="text-warning px-1 m-0 p-0 my-2"
                                                style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                                <p class="d-flex align-items-center" style="font-size: 14px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <span class="px-2 py-1">5</span>
                                                    <span>Đã bán 102</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center">
                            <h6 class="text-primary pt-3">
                                <button class="btn fw-bold text-primary" type="button">
                                    Xem thêm sản phẩm
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </h6>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <button class="btn fw-bold text-primary" type="button">
                                Xem thêm sản phảm
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="4-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="5" role="tabpanel" aria-labelledby="5-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="6" role="tabpanel" aria-labelledby="6-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="7" role="tabpanel" aria-labelledby="7-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="8" role="tabpanel" aria-labelledby="8-tab">
                    <div class="row">
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 my-2">
                            <a href="/OwlCarousel/dienmayxanh/chi-tiet-san-pham.html"
                                class="text-decoration-none text-black">
                                <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                    <img src="https://cdnv2.tgdd.vn/mwg-static/dmx/Products/Images/1943/325589/tu-lanh-lg-inverter-666-lit-multi-door-instaview-lfb66blmi-141024-045950-693-300x300.jpg"
                                        class="card-img-top" alt="...">
                                    <p class="bg-danger rounded-pill px-1 mt-2 text-white m-0 p-0"
                                        style="font-size: 12px; width: fit-content;">
                                        <img width="15px" class="img-fluid"
                                            src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/b0/2e/b02ea45200ac97e1f41bb89ac4714546.png"
                                            alt="">
                                        <span>NGÀY ĐÔI 4.4</span>
                                    </p>
                                    <div class="">
                                        <p class="card-text m-0 p-0"> LG Inverter 666 lít InstaView LFB66BLMI</p>
                                        <p class="text-warning px-1 m-0 p-0 my-2"
                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá</p>
                                        <p class="card-title m-0 p-0 fw-bold text-danger" style="font-size: 18px;">
                                            34.490.000₫</p>
                                        <p class="m-0 p-0">
                                            <span class="card-title m-0 p-0 text-decoration-line-through"
                                                style="font-size: 14px;">49.990.000₫</span><span
                                                class="text-danger">-31%</span>
                                        </p>
                                        <p class="m-0 p-0" style="font-size: 15px; width: fit-content;">
                                            Quà 160.000₫
                                        </p>
                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                            <span class="px-2">5</span>
                                            <span class="">Đã bán 102</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="text-primary pt-3">
                            <span>
                                Xem thêm sản phẩm
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </h6>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
</section>
<!-- hết khuyến mãi online  -->
