@extends('layout.client')

@section('title', 'Danh sách danh mục')

@section('css')
    <style>
        @media (max-width: 767px) {
            #simple-list-example {
                position: absolute;
                z-index: 10;
                top: 0;
                bottom: 0;
                left: 0;
                width: 100%;
                overflow-y: auto;
                max-height: calc(100vh - 100px);
            }

            .post-main {
                margin-top: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="bg-white rounded-3">
            <div class="container">
                <div class="pt-3 row post-layout">
                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-12 col-xs-12 col-12 px-2 post-sidebar">
                        <h5 class="fw-bold py-3">Tất cả nhóm hàng</h5>
                        <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy border"
                            style="position: sticky; top: 0; background-color: #f6f6f6;">
                            @if (isset($categoryParents) && !empty($categoryParents))
                                @foreach ($categoryParents as $item)
                                    <a class="p-2 text-decoration-none text-black"
                                        href="#simple-list-item-{{ $item->id }}"
                                        style="font-size: 14px;">{{ $item->name }}</a>
                                    @if (!$loop->last)
                                        <hr class="m-0 p-0">
                                    @endif
                                @endforeach
                            @endif
                            @if (isset($categoryParent) && !empty($categoryParent))
                                <a class="p-2 text-decoration-none text-black"
                                    href="#{{ $categoryParent->id }}-simple-list-item-{{ $categoryParent->id }}"
                                    style="font-size: 14px;">{{ $categoryParent->name }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-8 col-lg-7 col-sm-12 col-xs-12 col-12 post-main">
                        <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0"
                            data-bs-smooth-scroll="true" class="scrollspy-example mt-4 p-3" tabindex="0">
                            @if (isset($categoryParents) && !empty($categoryParents))
                                @foreach ($categoryParents as $items)
                                    <div id="simple-list-item-{{ $items->id }}">
                                        <h5 class="fw-bold py-3">{{ $items->name }}</h5>
                                        <div class="row">
                                            @foreach ($items->categories as $item)
                                                <div class="col-xl-4 col-lg-6 col-12">
                                                    @if ($item->products->count() > 0)
                                                        <a href="{{ route('category.show', ['slug' => $item->slug]) }}"
                                                            style="font-size: 14px;" class="text-decoration-none text-black">
                                                            {{ $item->name }}
                                                        </a>
                                                    @else
                                                        <a href="{{ route('post.category', ['slug' => $item->slug]) }}"
                                                            style="font-size: 14px;" class="text-decoration-none text-black">
                                                            {{ $item->name }}
                                                        </a>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if (isset($categoryParent) && !empty($categoryParent))
                                <div id="{{ $categoryParent->id }}-simple-list-item-{{ $categoryParent->id }}">
                                    <h5 class="fw-bold py-3">{{ $categoryParent->name }}</h5>
                                    <div class="row">
                                        @foreach ($categoryParent->categories as $item)
                                            <div class="col-xl-4 col-lg-6 col-12">
                                                @if ($item->products->count() > 0)
                                                    <a href="{{ route('category.show', ['slug' => $item->slug]) }}"
                                                        style="font-size: 14px;" class="text-decoration-none text-black">
                                                        {{ $item->name }}
                                                    </a>
                                                @else
                                                    <a href="{{ route('post.category', ['slug' => $item->slug]) }}"
                                                        style="font-size: 14px;" class="text-decoration-none text-black">
                                                        {{ $item->name }}
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-12 col-xs-12 col-12 px-2 post-sidebar">
                    <hr>
                    <p style="font-size: 14px">Tìm kiếm nhiều:</p>
                    @foreach ($searchs as $item)
                        <ul style="list-style-type: disc;">
                            <li style="font-size: 14px"><a href="{{ route('search.index', ['keyword' => $item->search]) }}"
                                    class="text-decoration-none">{{ $item->search }}</a></li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.querySelectorAll('#simple-list-example a').forEach(anchor => { // cuộn mượt hơn
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection
