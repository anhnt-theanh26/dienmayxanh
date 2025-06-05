@extends('layout.client')

@section('title', 'Bài viết')

@section('seo')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection

@section('css')
@endsection

@section('content')
    <section>
        <div class="bg-white rounded-3">
            <div class="container">
                <div class="row py-2" style="font-size: 13px">
                    <div class="col-xxl-7 col-xl-6 col-lg-6 col-sm-6 col-xs-6 col-12">
                        <p class="m-0 p-0">
                        <a class="text-secondary text-decoration-none" href="{{ route('index') }}">
                            Trang chủ
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                        </svg>
                        <span class="text-black">
                            {{ $post->category->name }}
                        </span>
                    </p>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 col-xs-6 col-12">
                        <div class="m-0 p-0 d-flex align-items-center">
                        <span>Chia sẻ cho bạn bè</span>
                        <span class="mx-2">
                            <span class="badge text-bg-primary">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                    </svg>
                                    Thích 7,9k
                                </div>
                            </span>
                        </span>
                        <span class="badge text-bg-primary">
                            Chia sẻ
                        </span>
                    </div>
                    </div>
                    <div class="col-xxl-2 col-xl-3 col-lg-3 col-sm-6 col-xs-6 col-12">
                        <p class="m-0 p-0">
                        <span>Tổng đài tư vấn: </span>
                        <span class="fw-bold">0348022004</span>
                    </p>
                    </div>
                </div>
                {{-- <div class="py-2 d-flex align-items-center" style="font-size: 14px">
                    <p class="m-0 p-0" style="width: 50%;">
                        <a class="text-secondary text-decoration-none" href="{{ route('index') }}">
                            Trang chủ
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                        </svg>
                        <span class="text-black">
                            {{ $post->category->name }}
                        </span>
                    </p>
                    <div class="m-0 p-0 d-flex align-items-center" style="width: 30%;">
                        <span>Chia sẻ cho bạn bè</span>
                        <span class="mx-2">
                            <span class="badge text-bg-primary">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                    </svg>
                                    Thích 7,9k
                                </div>
                            </span>
                        </span>
                        <span class="badge text-bg-primary">
                            Chia sẻ
                        </span>
                    </div>
                    <p class="m-0 p-0" style="width: 20%;">
                        <span>Tổng đài tư vấn: </span>
                        <span class="fw-bold">0348022004</span>
                    </p>
                </div> --}}
                <div class="pt-3 row post-layout">
                    <div class="col-xxl-8 col-xl-8 col-lg-7 col-sm-12 col-xs-12 col-12 post-main">
                        <article class="article">
                            <div class="content-left" style="margin-right: 10px">
                                <div class="">
                                    <p class="fw-bold" style="font-size: 24px">
                                        {{ $post->title }}
                                    </p>
                                    <p class="text-secondary m-0 p-0">
                                        <span>Đăng lúc</span>
                                        <span>{{ \Carbon\Carbon::parse($post->published_at)->format('H:i d/m/Y') }}</span>
                                        <span>&#8226; {{ $post->view_count }} lượt xem</span>
                                    </p>
                                    <hr>
                                </div>
                                <div class="">
                                    <p class="fw-bold">
                                        {{ $post->excerpt }}
                                    </p>
                                    <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                                    <div class="py-2 m-0 p-0">
                                        {!! $post->content !!}
                                    </div>
                                    <p class="fw-bold">Thảm khảo:</p>
                                    <div class="products">
                                        <div class="owl-carousel reference-products">
                                            @foreach ($post->category->products as $product)
                                                <div class="item row">
                                                    <div class="col-12 m-0 p-0">
                                                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}"
                                                            class="text-decoration-none text-black">
                                                            <div class="p-3 m-2 border"
                                                                style="min-height: 450px; max-height: 450px;">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <p class="bg-secondary-subtle rounded-1 px-1"
                                                                        style="font-size: 12px; width: fit-content;">
                                                                        Trả chậm 0%</p>
                                                                    @if ($product->is_hot == true)
                                                                        <p class="bg-danger-subtle rounded-pill px-1 text-danger fw-bold"
                                                                            style="font-size: 12px; width: fit-content;">Hot
                                                                        </p>
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
                                                                        {{ \Illuminate\Support\Str::limit($product->name, 40) }}
                                                                    </p>
                                                                    <p class="card-title m-0 p-0 py-1 fw-bold text-danger"
                                                                        style="font-size: 18px;">
                                                                        {{ number_format($product?->variants?->first()?->price, 0, '.', '.') }}₫
                                                                    </p>
                                                                    <p class="m-0 p-0 py-1">
                                                                        <span
                                                                            class="card-title m-0 p-0 text-decoration-line-through"
                                                                            style="font-size: 14px;">{{ number_format($product?->variants?->first()?->price_old, 0, '.', '.') }}₫</span>
                                                                        @if (round((($product?->variants?->first()?->price_old - $product?->variants?->first()?->price) / $product?->variants?->first()?->price_old) * 100) > 0)
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
                                                                        style="font-size: 12px; width: fit-content;">Online
                                                                        giá
                                                                        rẻ quá
                                                                    </p>
                                                                    <p class="d-flex align-items-center"
                                                                        style="font-size: 14px;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
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
                                                </div>
                                            @endforeach
                                        </div>
                                        <script>
                                            var owl = $('.reference-products');
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
                                    <div class="rounded-1 m-0 p-0"
                                        style="border: 1px solid #c3e5f8; background-color: #dbedf9;">
                                        <div class="p-3 m-0 p-0">
                                            <p class="fw-bold m-0 p-0">Xem thêm:</p>
                                            <ul class="m-0 p-0 px-3" style="list-style-type: disc;">
                                                @foreach ($post->category->posts as $item)
                                                    @if ($item->id != $post->id)
                                                        <li>
                                                            <a href=""
                                                                class="text-decoration-none">
                                                                {{ $item->title }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-0 p-0 d-flex align-items-center py-3" style="font-size: 14px">
                                        <span class="">
                                            <span class="badge text-bg-primary">
                                                <div class="d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-hand-thumbs-up-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                    </svg>
                                                    Thích 7,9k
                                                </div>
                                            </span>
                                        </span>
                                        <span class="badge text-bg-primary mx-2">
                                            Chia sẻ
                                        </span>
                                        <span>Chia sẻ cho bạn bè</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-sm-12 col-xs-12 col-12 px-2 post-sidebar">
                        <div class="content-right" style="position: sticky; top: 0;">
                            <p>Các tin khuyến mãi khác</p>
                            <hr>
                            <div class="news">
                                @foreach ($post->category->posts as $item)
                                    @if ($item->id != $post->id)
                                        <div class="new-item">
                                            <a href=""
                                                class="text-decoration-none text-black">
                                                <div class="d-flex">
                                                    <div style="width: 120px">
                                                        <img style="width: 120px;" src="{{ asset($item->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div style="font-size: 13px" class="px-2">
                                                        <p class="fw-bold m-0 p-0">
                                                            {{ $item->title }}
                                                        </p>
                                                        <p class="text-secondary m-0 p-0">
                                                            {{ Carbon\Carbon::create($item->published_at)->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="banner-image" id="sticky-banner">
                                <img class="img-fluid py-1"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/Banner/c1/2d/c12d8aa24011529d78c543c8fa3d7fea.png"
                                    alt="">
                                <img class="img-fluid py-1"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/Banner/c1/2d/c12d8aa24011529d78c543c8fa3d7fea.png"
                                    alt="">
                                <img class="img-fluid py-1" id="banner-image-1"
                                    src="https://cdnv2.tgdd.vn/mwg-static/dmx/Banner/c1/2d/c12d8aa24011529d78c543c8fa3d7fea.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
