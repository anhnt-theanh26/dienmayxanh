<div class="row">
    @php
        $takeResult12 = $results;
        $takeSkip12 = collect();
        if ($results->count() > 12) {
            $takeResult12 = $results->take(12);
            $takeSkip12 = $results->skip(12);
        }
    @endphp
    @foreach ($takeResult12 as $product)
        <div class="col-xl-2 col-lg-3 col-md-4 col-xs-6 col-6 my-2">
            <a href="{{ route('product.show', [$product->slug, $product->id]) }}" class="text-decoration-none text-black">
                <div class="p-3 border rounded-2" style="min-height: 450px; max-height: 450px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="bg-secondary-subtle rounded-1 px-1" style="font-size: 12px; width: fit-content;">Trả
                            chậm 0%</p>
                        @if ($product?->is_hot == true)
                            <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                style="font-size: 12px; width: fit-content;">Hot</p>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="height: 160px;">
                        <img height="100%"
                            src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
                            style="" class="card-img-top rounded-2 object-fit-contain"
                            alt="{{ $product->name ? $product->name : 'Khong co anh' }}">
                    </div>
                    <div>
                        <p class="card-text m-0 p-0 py-2"
                            style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box; font-size: 14px; font-weight: 600; height: 70px; overflow: hidden; position: relative; z-index: 9;">
                            {{ \Illuminate\Support\Str::limit($product?->name, 40) }}</p>
                        <p class="card-title m-0 p-0 py-1 fw-bold text-danger" style="font-size: 18px;">
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
                        @if ($product?->attributeValues?->first())
                            <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                style="font-size: 12px; width: fit-content;">
                                {{ \Illuminate\Support\Str::limit($product?->attributeValues?->first()?->attribute?->name ? $product?->attributeValues?->first()?->attribute?->name : '', 10) }}:
                                {{ \Illuminate\Support\Str::limit($product?->attributeValues?->first()?->value ? $product?->attributeValues?->first()?->value : '', 10) }}
                            </p>
                        @endif
                        <p class="text-warning px-1 m-0 p-0 py-1" style="font-size: 12px; width: fit-content;">
                            Online giá rẻ quá
                        </p>
                        <p class="d-flex align-items-center" style="font-size: 14px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <span class="px-2 py-1">5</span>
                            <span>Đã bán {{ $product?->sold }}</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    @if ($takeSkip12 && $takeSkip12->isNotEmpty())
        <div class="text-center hiding-search">
            <h6 class="text-primary">
                <button class="btn click-hiding-search fw-bold text-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Xem thêm {{ count($takeSkip12) }} sản phảm
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                </svg>
            </h6>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="row">
                @foreach ($takeSkip12 as $product)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-xs-6 col-6 my-2">
                        <a href="{{ route('product.show', [$product->slug, $product->id]) }}"
                            class="text-decoration-none text-black">
                            <div class="p-3 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                        style="font-size: 12px; width: fit-content;">Trả chậm 0%
                                    </p>
                                    @if ($product?->is_hot == true)
                                        <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                            style="font-size: 12px; width: fit-content;">Hot</p>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center align-items-center" style="height: 160px;">
                                    <img height="100%"
                                        src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
                                        style="" class="card-img-top rounded-2 object-fit-contain"
                                        alt="{{ $product->name ? $product->name : 'Khong co anh' }}">
                                </div>
                                <div>
                                    <p class="card-text m-0 p-0 py-2"
                                        style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box; font-size: 14px; font-weight: 600; height: 70px; overflow: hidden; position: relative; z-index: 9;">
                                        {{ \Illuminate\Support\Str::limit($product?->name, 40) }}
                                    </p>
                                    <p class="card-title m-0 p-0 py-1 fw-bold text-danger" style="font-size: 18px;">
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
                                    @if ($product?->attributeValues?->first())
                                        <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                            style="font-size: 12px; width: fit-content;">
                                            {{ \Illuminate\Support\Str::limit($product?->attributeValues?->first()?->attribute?->name ? $product?->attributeValues?->first()?->attribute?->name : '', 10) }}:
                                            {{ \Illuminate\Support\Str::limit($product?->attributeValues?->first()?->value ? $product?->attributeValues?->first()?->value : '', 10) }}
                                        </p>
                                    @endif
                                    <p class="text-warning px-1 m-0 p-0 py-1"
                                        style="font-size: 12px; width: fit-content;">Online giá rẻ
                                        quá
                                    </p>
                                    <p class="d-flex align-items-center" style="font-size: 14px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <span class="px-2 py-1">5</span>
                                        <span>Đã bán {{ $product?->sold }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
<script>
    $('.click-hiding-search').click(function() {
        var hidingsearch = document.querySelector('.hiding-search');
        hidingsearch.style.display = 'none';
    });
</script>
