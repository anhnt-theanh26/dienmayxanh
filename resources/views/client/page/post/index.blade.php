@extends('layout.client')

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
                <div class="py-2 d-flex align-items-center" style="font-size: 14px">
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
                            {{ $posts->name ?? $categoryPosts->name }}
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
                        <span class="fw-bold">
                            @php
                                $supportArr = null;
                                if (isset($setting) && !empty($setting)) {
                                    if ($setting?->support) {
                                        $supportArr = json_decode($setting?->support, true);
                                        if (json_last_error() !== JSON_ERROR_NONE) {
                                            $supportArr = null;
                                        }
                                    }
                                }
                                $firstSupport = $supportArr[0] ?? null;
                            @endphp
                            @if ($firstSupport)
                                <a href="{{ $firstSupport['href'] }}" class="text-decoration-none text-black">
                                    {{ $firstSupport['phone'] }}
                                </a>
                            @endif
                        </span>
                    </p>
                </div>
                <div class="row py-3">
                    @php
                        if (isset($posts) && !empty($posts)) {
                            $postMenus = collect();
                            foreach ($posts?->productmenuitems as $productmenuitem) {
                                foreach ($productmenuitem?->category?->posts as $post) {
                                    $postMenus->push($post);
                                }
                            }
                            $postMenus = $postMenus->sortByDesc('is_hot');
                        }
                    @endphp
                    @if (isset($posts) && !empty($posts))
                        @if ($postMenus && $postMenus->isNotEmpty())
                            @foreach ($postMenus as $post)
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}"
                                        class="text-decoration-none text-black">
                                        <div style="background-color: #f7f7f7;">
                                            <div class="d-flex justify-content-center align-items-center"
                                                style="height: 280px">
                                                <img class="img-fluid object-fit-fill" style="height: 280px; width: 100%;"
                                                    src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                            </div>
                                            <div style="height: 120px">
                                                <p class="fw-bold p-2 m-0 p-0">
                                                    {{ $post->title }}
                                                </p>
                                                <hr class="m-0">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endif
                    @if (isset($categoryPosts) && !empty($categoryPosts))
                        @foreach ($categoryPosts->posts->sortByDesc('is_hot') as $post)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                                <a href="{{ route('post.show', ['slug' => $post->slug]) }}"
                                    class="text-decoration-none text-black">
                                    <div style="background-color: #f7f7f7;">
                                        <div class="d-flex justify-content-center align-items-center" style="height: 280px">
                                            <img class="img-fluid object-fit-fill" style="height: 280px; width: 100%;"
                                                src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                        </div>
                                        <div style="height: 120px">
                                            <p class="fw-bold p-2 m-0 p-0">
                                                {{ $post->title }}
                                            </p>
                                            <hr class="m-0">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
