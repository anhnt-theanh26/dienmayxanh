@php
    $productmenuitemthird = null;
    $productmenuitemthirddata = [];
    if (!empty($productmenus) && $productmenus !== null) {
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


@if ($productmenuitemthird && $productmenuitemthird->isNotEmpty())
    <section>
        <div class="container">
            <h4 class="fw-bold py-4">{{ $thirdProductMenu->productmenus->first()->name }}</h4>
            <div class="bg-white rounded-4 p-3">
                <div class="row">
                    @php
                        $bannermain4 = null;
                        if (!empty($bannermenus) && $bannermenus !== null) {
                            $bannerMenu = $bannermenus->skip(4)->first();
                            if ($bannerMenu?->bannermenus) {
                                $bannermain4 = $bannerMenu?->bannermenus
                                    ?->first()
                                    ?->bannermenuitems?->sortBy('location');
                            }
                        }
                    @endphp
                    <div class="col-4">
                        @if ($bannermain4 && $bannermain4->isNotEmpty())
                            <img src="{{ $bannermain4->first()->image ? asset($bannermain4->first()->image) : asset('storage/default.jpg') }}"
                                style="width: 380px; height: 500px;" class="object-fit-contain" alt="">
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="owl-carousel">
                            @foreach ($productmenuitemthirddata as $product)
                                <div class="item row">
                                    <div class="col-12 my-2">
                                        <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                            class="text-decoration-none text-black">
                                            <div class="p-3 m-2 border rounded-2"
                                                style="min-height: 450px; max-height: 450px;">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                                        style="font-size: 12px; width: fit-content;">
                                                        Trả chậm 0%</p>
                                                    @if ($product->is_hot == true)
                                                        <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                            style="font-size: 12px; width: fit-content;">Hot</p>
                                                    @endif
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center"
                                                    style="height: 160px;">
                                                    <img height="100%"
                                                        src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
                                                        style="" class="card-img-top rounded-2 object-fit-contain"
                                                        alt="{{ $product->name ? $product->name : 'Khong co anh' }}">
                                                </div>
                                                <div>
                                                    <p class="card-text m-0 p-0 py-2"
                                                        style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box; font-size: 14px; font-weight: 600; height: 70px; overflow: hidden; position: relative; z-index: 9;">
                                                        {{ \Illuminate\Support\Str::limit($product->name, 40) }}</p>
                                                    <p class="card-title m-0 p-0 py-1 fw-bold text-danger"
                                                        style="font-size: 18px;">
                                                        {{ number_format($product?->variants?->first()?->price, 0, '.', '.') }}₫
                                                    </p>
                                                    <p class="m-0 p-0 py-1">
                                                        <span class="card-title m-0 p-0 text-decoration-line-through"
                                                            style="font-size: 14px;">{{ number_format($product?->variants?->first()?->price_old, 0, '.', '.') }}₫</span>
                                                        @if (round(
                                                                (($product?->variants?->first()?->price_old - $product?->variants?->first()?->price) /
                                                                    $product?->variants?->first()?->price_old) *
                                                                    100) > 0)
                                                            <span class="text-danger">
                                                                -{{ round((($product?->variants?->first()?->price_old - $product?->variants?->first()?->price) / $product?->variants?->first()?->price_old) * 100) }}%
                                                            </span>
                                                        @endif
                                                    </p>
                                                    @if ($product->attributeValues->first())
                                                        <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                                            style="font-size: 12px; width: fit-content;">
                                                            {{ $product->attributeValues->first()->attribute->name ? $product->attributeValues->first()->attribute->name : '' }}:
                                                            {{ $product->attributeValues->first()->value ? $product->attributeValues->first()->value : '' }}
                                                        </p>
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
                                </div>
                            @endforeach
                        </div>
                        <script>
                            var owl = $('.owl-carousel');
                            owl.owlCarousel({
                                autoplay: true,
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
