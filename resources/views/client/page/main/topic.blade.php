@php
    $productmenuitemfourth = null;
    $productmenuitemfourthdata = [];
    if (!empty($productmenus) && $productmenus !== null) {
        $fourthProductMenu = $productmenus?->skip(3)?->first();
        if ($fourthProductMenu?->productmenus) {
            $productmenuitemfourth = $fourthProductMenu?->productmenus
                ?->first()
                ?->productmenuitems?->sortBy('location');
        }
    }
@endphp

@if ($productmenuitemfourth && $productmenuitemfourth->isNotEmpty())
    <section>
        <div class="container mt-5" style="flex-shrink: 0; min-width: 1200px;">
            <div class="bg-white rounded-4 p-3">
                <h4 class="fw-bold">#{{ $fourthProductMenu->name }}</h4>
                <ul class="nav d-flex nav-tabs" id="myTab" role="tablist">
                    @foreach ($productmenus?->skip(3) as $location)
                        @foreach ($location?->productmenus as $postmenus)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-2 {{ $loop->first ? 'active' : '' }}" id="topic-sale-tab"
                                    data-bs-toggle="tab" data-bs-target="#topic-{{ $postmenus->slug }}" type="button"
                                    role="tab" aria-controls="topic-sale"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $postmenus->name }}
                                </button>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach ($productmenus?->skip(3) as $location)
                        @foreach ($location?->productmenus as $postmenus)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="topic-{{ $postmenus->slug }}" role="tabpanel" aria-labelledby="topic-sale-tab">
                                <div class="owl-carousel pt-2">
                                    @foreach ($postmenus?->productmenuitems?->sortBy('location') as $muneitem)
                                        @foreach ($muneitem?->category?->posts as $post)
                                            <div class="item">
                                                <div class="image">
                                                    <img class="img-fluid rounded-3 object-fit-contain border"
                                                        style="height: 160px"
                                                        src="{{ $post->image ? asset($post->image) : asset('storage/default.jpg') }}"
                                                        alt="{{ $post->name ? $post->name : 'Khong co anh' }}">
                                                </div>
                                                <div class="pt-1 title">
                                                    <p>
                                                        {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <script>
                                    var owl = $('.owl-carousel');
                                    owl.owlCarousel({
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
                                <div class="text-center">
                                    <h6 class="text-primary pt-3">
                                        <span>
                                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0"
                                                href="#"> Xem thêm {{ $postmenus->name }}</a>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endif