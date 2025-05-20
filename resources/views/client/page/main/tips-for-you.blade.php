@php
    $productmenuitemsecond = null;
    $productmenuitemseconddata = [];
    if (!empty($productmenus) && $productmenus !== null) {
        $secondProductMenu = $productmenus?->skip(1)?->first();
        if ($secondProductMenu?->productmenus) {
            $productmenuitemsecond = $secondProductMenu?->productmenus
                ?->first()
                ?->productmenuitems?->sortBy('location');
        }
        if ($productmenuitemsecond) {
            foreach ($productmenuitemsecond as $categories) {
                foreach ($categories?->category?->products as $product) {
                    $productmenuitemseconddata[] = $product;
                }
            }
            if ($productmenuitemseconddata) {
                $productmenuitemseconddatatake12 = collect($productmenuitemseconddata)->take(12);
                $productmenuitemseconddataskip12 = collect($productmenuitemseconddata)->skip(12);
            }
        }
    }
@endphp

@if ($productmenuitemsecond && $productmenuitemsecond->isNotEmpty())
    <section>
        <div class="container">
            <h4 class="fw-bold py-4">{{ $secondProductMenu->productmenus->first()->name }}</h4>
            <div class="bg-white rounded-4 p-2">
                <div class="row">
                    @if ($productmenuitemseconddatatake12 && $productmenuitemseconddatatake12->isNotEmpty())
                        @foreach ($productmenuitemseconddatatake12 as $product)
                            <div class="col-2 my-2">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                    class="text-decoration-none text-black">
                                    <div class="p-3 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="bg-secondary-subtle rounded-1 px-1"
                                                style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                            @if ($product->is_hot == true)
                                                <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                    style="font-size: 12px; width: fit-content;">Hot</p>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="height: 160px;">
                                            <img height="100%" src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
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
                    @if ($productmenuitemseconddataskip12->count() > 0)
                        <div class="text-center hiding-btn-01">
                            <h6 class="text-primary">
                                <button class="btn click-hiding-btn-01 fw-bold text-primary" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Xem thêm {{ $productmenuitemseconddataskip12->count() }} sản phảm
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                </svg>
                            </h6>
                        </div>
                    @endif
                    <div class="collapse" id="collapseExample">
                        <div class="row">
                            @if ($productmenuitemseconddataskip12 && $productmenuitemseconddataskip12->isNotEmpty())
                                @foreach ($productmenuitemseconddataskip12 as $product)
                                    <div class="col-2 my-2">
                                        <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                            class="text-decoration-none text-black">
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
                                                <img height="100%" src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
                                                    style="" class="card-img-top rounded-2 object-fit-contain"
                                                    alt="{{ $product->name ? $product->name : 'Khong co anh' }}">
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
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <script>
                    $('.click-hiding-btn-01').click(function() {
                        var advertisement01Hiding = document.querySelector('.hiding-btn-01');
                        advertisement01Hiding.style.display = 'none';
                    });
                </script>
            </div>
        </div>
    </section>
@endif
