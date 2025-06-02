@extends('layout.client')

@section('title', 'Tìm kiếm')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.css" rel="stylesheet">

@endsection

@section('content')
    <section>
        <div class="container">
            <p class="p-2 m-0 p-0">
                <a class="text-secondary text-decoration-none" href="{{ route('index') }}">
                    Trang chủ
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
                <span class="text-black">
                    {{ $keyword ?? '' }}
                    <input type="hidden" name="search" value="{{ $keyword ?? '' }}">
                </span>
            </p>
            <div class="bg-white rounded-4 p-4">
                <div class="">
                    <button class="btn border-primary btn-outline-primary" data-bs-target="#filter" data-bs-toggle="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-funnel" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                        Lọc
                    </button>
                    <div class="modal modal-lg fade text-black" id="filter" aria-hidden="true"
                        aria-labelledby="filterLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="filterLabel">
                                        Điện máy XANH
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="">
                                        <h4>Chọn khoảng giá:</h4>
                                        <div id="slider"></div>
                                        <p class="mt-3">
                                            Giá từ: <strong id="minValue"></strong> đến <strong id="maxValue"></strong>
                                        </p>
                                    </div>
                                    <div class="pt-2">
                                        <h5>Danh mục:</h5>
                                        @php
                                            $categorysSelects = [];
                                            foreach ($results as $item) {
                                                if (!in_array($item->category, $categorysSelects)) {
                                                    array_push($categorysSelects, $item->category);
                                                }
                                            }
                                        @endphp
                                        @foreach ($categorysSelects as $category)
                                            <input type="checkbox" class="btn-check" id="btn-check-{{ $category->id }}"
                                                value="{{ $category->id }}" autocomplete="off">
                                            <label class="btn"
                                                for="btn-check-{{ $category->id }}">{{ $category->name }}</label>
                                        @endforeach
                                    </div>
                                    <div class="pt-2">
                                        <h5>Thuộc tính:</h5>

                                        <input type="checkbox" class="btn-check" id="btn-check-3" autocomplete="off">
                                        <label class="btn" for="btn-check-3">Single toggle</label>

                                        <input type="checkbox" class="btn-check" id="btn-check-4" autocomplete="off">
                                        <label class="btn" for="btn-check-4">Checked</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div style="margin-right: 10px">
                        Sắp xếp theo:
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio1"
                            autocomplete="off" value="outstanding">
                        <label class="btn" for="btnradio1">Nổi bật</label>

                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio2"
                            autocomplete="off" value="selling-well">
                        <label class="btn" for="btnradio2">Bán chạy</label>

                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio3"
                            autocomplete="off" value="discount">
                        <label class="btn" for="btnradio3">Giảm giá</label>

                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio4"
                            autocomplete="off" value="new">
                        <label class="btn" for="btnradio4">Mới</label>

                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio5"
                            autocomplete="off" value="low-high">
                        <label class="btn" for="btnradio5">Giá thấp - cao</label>

                        <input type="radio" class="btn-check btn-check-filter" name="btnradio" id="btnradio6"
                            autocomplete="off" value="high-low">
                        <label class="btn" for="btnradio6">Giá cao - thấp</label>
                    </div>

                </div>
                <div class="show-result-check-radio">
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
                            <div class="col-2 my-2">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                    class="text-decoration-none text-black">
                                    <div class="p-3 border rounded-2" style="min-height: 450px; max-height: 450px;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="bg-secondary-subtle rounded-1 px-1"
                                                style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                            @if ($product?->is_hot == true)
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
                                                {{ \Illuminate\Support\Str::limit($product?->name, 40) }}</p>
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
                                            @if ($product?->attributeValues?->first())
                                                <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                                    style="font-size: 12px; width: fit-content;">
                                                    {{ $product?->attributeValues?->first()?->attribute?->name ? $product?->attributeValues?->first()?->attribute?->name : '' }}:
                                                    {{ $product?->attributeValues?->first()?->value ? $product?->attributeValues?->first()?->value : '' }}
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
                        @if ($takeSkip12 && $takeSkip12->isNotEmpty())
                            <div class="text-center hiding-search">
                                <h6 class="text-primary">
                                    <button class="btn click-hiding-search fw-bold text-primary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Xem thêm {{ count($takeSkip12) }} sản phảm
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </h6>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="row">
                                    @foreach ($takeSkip12 as $product)
                                        <div class="col-2 my-2">
                                            <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                                class="text-decoration-none text-black">
                                                <div class="p-3 border rounded-2"
                                                    style="min-height: 450px; max-height: 450px;">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="bg-secondary-subtle rounded-1 px-1"
                                                            style="font-size: 12px; width: fit-content;">Trả chậm 0%</p>
                                                        @if ($product?->is_hot == true)
                                                            <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                                style="font-size: 12px; width: fit-content;">Hot</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center"
                                                        style="height: 160px;">
                                                        <img height="100%"
                                                            src="{{ $product->image ? asset($product->image) : asset('storage/default.jpg') }}"
                                                            style=""
                                                            class="card-img-top rounded-2 object-fit-contain"
                                                            alt="{{ $product->name ? $product->name : 'Khong co anh' }}">
                                                    </div>
                                                    <div>
                                                        <p class="card-text m-0 p-0 py-2"
                                                            style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box; font-size: 14px; font-weight: 600; height: 70px; overflow: hidden; position: relative; z-index: 9;">
                                                            {{ \Illuminate\Support\Str::limit($product?->name, 40) }}</p>
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
                                                        @if ($product?->attributeValues?->first())
                                                            <p class="bg-secondary-subtle m-0 p-0 rounded-1 px-2 py-1"
                                                                style="font-size: 12px; width: fit-content;">
                                                                {{ $product?->attributeValues?->first()?->attribute?->name ? $product?->attributeValues?->first()?->attribute?->name : '' }}:
                                                                {{ $product?->attributeValues?->first()?->value ? $product?->attributeValues?->first()?->value : '' }}
                                                            </p>
                                                        @endif
                                                        <p class="text-warning px-1 m-0 p-0 py-1"
                                                            style="font-size: 12px; width: fit-content;">Online giá rẻ
                                                            quá
                                                        </p>
                                                        <p class="d-flex align-items-center" style="font-size: 14px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
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
                </div>
            </div>
        </div>
    </section>
    <div class="">
        <h1>heheh</h1>
        @php
            $groupedAttributes = [];

            foreach ($results as $items) {
                foreach ($items->attributeValues as $item) {
                    $attributeName = $item->attribute->name;
                    if (!isset($groupedAttributes[$attributeName])) {
                        $groupedAttributes[$attributeName] = [];
                    }
                    $groupedAttributes[$attributeName][] = $item;
                }
            }
        @endphp
    </div>
@endsection

@section('js')
    <script>
        // filter
        let btnCheck = document.querySelectorAll('.btn-check-filter');
        btnCheck.forEach(element => {
            element.addEventListener('change', function() {
                if (element.checked) {
                    $.ajax({
                            url: "{{ route('search.filter') }}",
                            type: "GET",
                            data: {
                                'type': element.value
                            }
                        })
                        .done((response) => {
                            $('.show-result-check-radio').empty().html(response);
                            console.log(response);
                        })
                        .fail((jqXHR, textStatus, errorThrown) => {
                            alertify.error('Có lỗi xảy ra vui lòng thử lại sau!');
                            console.error("Error filter:", textStatus, errorThrown);
                        });
                }
            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>
    <script>
        // range filter price
        let getPrice = {!! json_encode($results->toArray()) !!}.map(item => item.variants.map(i => Number(i.price))).flat();
        var min = Number(Math.min(...getPrice));
        var max = Number(Math.max(...getPrice));
        const slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [min, max],
            connect: true,
            step: 10000,
            range: {
                min: min,
                max: max
            },
            format: {
                to: function(value) {
                    return Math.round(value);
                },
                from: function(value) {
                    return Number(value);
                }
            }
        });

        const minValue = document.getElementById('minValue');
        const maxValue = document.getElementById('maxValue');

        slider.noUiSlider.on('update', function(values) {
            minValue.textContent = Number(values[0]).toLocaleString('vi-VN') + '₫';
            maxValue.textContent = Number(values[1]).toLocaleString('vi-VN') + '₫';
        });
    </script>

@endsection
