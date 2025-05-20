<section>
    <div class="container">
        <div class="px-4 py-3">
            <div class="bg-white rounded-3 px-3">
                <h6 class="fw-bold m-0 p-0 py-3 pt-4">Sản phẩm thường mua cùng</h6>
                <div class="owl-carousel product-buy-together">
                    @foreach ($product->category->products as $productsamecategory)
                        @if ($productsamecategory->id != $product->id)
                            <div class="item row">
                                <div class="col-12 my-2">
                                    <a href="{{ route('product-detail', ['slug' => $productsamecategory->slug]) }}"
                                        class="text-decoration-none text-black">
                                        <div class="p-3 m-2 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="bg-secondary-subtle rounded-1 px-1"
                                                    style="font-size: 12px; width: fit-content;">
                                                    Trả chậm 0%</p>
                                                @if ($productsamecategory->is_hot == true)
                                                    <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                        style="font-size: 12px; width: fit-content;">Hot</p>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center"
                                                style="height: 160px;">
                                                <img height="100%" src="{{ $productsamecategory->image ? asset($productsamecategory->image) : asset('storage/default.jpg') }}"
                                                    style="" class="card-img-top rounded-2 object-fit-contain"
                                                    alt="{{ $productsamecategory->name ? $productsamecategory->name : 'Khong co anh' }}">
                                            </div>
                                            <div>
                                                <p class="card-text m-0 p-0 py-2">
                                                    {{ \Illuminate\Support\Str::limit($productsamecategory->name, 40) }}</p>
                                                <p class="card-title m-0 p-0 py-1 fw-bold text-danger"
                                                    style="font-size: 18px;">
                                                    {{ number_format($productsamecategory?->variants?->first()?->price, 0, '.', '.') }}₫
                                                </p>
                                                <p class="m-0 p-0 py-1">
                                                    <span class="card-title m-0 p-0 text-decoration-line-through"
                                                        style="font-size: 14px;">{{ number_format($productsamecategory?->variants?->first()?->price_old, 0, '.', '.') }}₫</span>
                                                    @if (round(
                                                            (($productsamecategory?->variants?->first()?->price_old - $productsamecategory?->variants?->first()?->price) /
                                                                $productsamecategory?->variants?->first()?->price_old) *
                                                                100) > 0)
                                                        <span class="text-danger">
                                                            -{{ round((($productsamecategory?->variants?->first()?->price_old - $productsamecategory?->variants?->first()?->price) / $productsamecategory?->variants?->first()?->price_old) * 100) }}%
                                                        </span>
                                                    @endif
                                                </p>
                                                @if ($productsamecategory->attributeValues->first())
                                                    <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                                        style="font-size: 12px; width: fit-content;">
                                                        {{ $productsamecategory->attributeValues->first()->attribute->name ? $productsamecategory->attributeValues->first()->attribute->name : '' }}:
                                                        {{ $productsamecategory->attributeValues->first()->value ? $productsamecategory->attributeValues->first()->value : '' }}
                                                    </p>
                                                @endif
                                                <p class="text-warning px-1 m-0 p-0 py-1"
                                                    style="font-size: 12px; width: fit-content;">Online giá rẻ quá
                                                </p>
                                                <p class="d-flex align-items-center" style="font-size: 14px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill text-warning"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <span class="px-2 py-1">5</span>
                                                    <span>Đã bán {{ $productsamecategory->sold }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <script>
                    var owl = $('.product-buy-together');
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
                                items: 5
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</section>
