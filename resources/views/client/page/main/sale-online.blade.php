<!-- khuyến mãi online  -->
@php
    $productmenuitemfirst = null;
    if ($productmenus->isNotEmpty()) {
        $firstProductMenu = $productmenus->first();
        if ($firstProductMenu->productmenus->isNotEmpty()) {
            $productmenuitemfirst = $firstProductMenu->productmenus->first()->productmenuitems;
        }
    }
@endphp

@if ($productmenuitemfirst)
    <section>
        <div class="container">
            <h4 class="fw-bold py-4">{{$productmenus->first()->productmenus->first()->name}}</h4>
            <div class="bg-white rounded-4 p-3">
                <ul class="nav d-flex nav-tabs  d-flex align-items-center justify-content-between" id="myTab"
                    role="tablist">
                    @foreach ($productmenuitemfirst as $index => $item)
                        @if ($item->category->products->count() > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-2 {{ $loop->first ? 'active' : '' }}" id="tab-{{ $index }}"
                                    data-bs-toggle="tab" data-bs-target="#tab-content-{{ $index }}" type="button"
                                    role="tab" aria-controls="tab-content-{{ $index }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    <img style="width: 100px; height: 40px;" src="{{ $item->category->image }}"
                                        alt="">
                                </button>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <img class="img-fluid p-4"
                    src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/a9/7f/a97f59eed78c14dbb0943f03607b49d5.png"
                    alt="">
                <div class="tab-content" id="myTabContent">
                    @foreach ($productmenuitemfirst as $index => $categories)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="tab-content-{{ $index }}" role="tabpanel" aria-labelledby="tab-{{ $index }}">
                            <div class="row">
                                @if ($categories->category->products->count() > 0)
                                    @foreach ($categories->category->products as $product)
                                        <div class="col-2 my-2">
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="p-3 border rounded-2"
                                                    style="min-height: 450px; max-height: 450px;">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="bg-secondary-subtle rounded-1 px-1"
                                                            style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                                        @if ($product->is_hot == true)
                                                            <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                                style="font-size: 12px; width: fit-content;">Hot</p>
                                                        @endif
                                                    </div>
                                                    <img src="{{ $product->image }}" style=""
                                                        class="card-img-top rounded-2 object-fit-contain"
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
                                                        @if ($product->attributeValues->first())
                                                            <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-1 py-1"
                                                                style="font-size: 12px; width: fit-content;">
                                                                {{ $product->attributeValues->first()->attribute->name ?? '' }}:
                                                                {{ $product->attributeValues->first()->value ?? '' }}</p>
                                                        @endif
                                                        <p class="text-warning px-1 m-0 p-0 py-1"
                                                            style="font-size: 12px; width: fit-content;">Online giá rẻ quá
                                                        </p>
                                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <span class="px-2 py-1">5</span>
                                                            <span>Đã bán {{ $product->sold }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="text-center">
                                <a href="#" class="text-decoration-none">
                                    <h6 class="text-primary pt-3">
                                        <button class="btn fw-bold text-primary" type="button">
                                            Xem thêm sản phẩm
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endif
<!-- hết khuyến mãi online  -->
