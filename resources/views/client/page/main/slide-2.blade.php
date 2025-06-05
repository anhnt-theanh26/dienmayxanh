@php
    $bannermain3 = null;
    if (!empty($bannermenus) && $bannermenus !== null) {
        $bannerMenu = $bannermenus->skip(3)->first();
        if ($bannerMenu?->bannermenus) {
            $bannermain3 = $bannerMenu?->bannermenus?->first()?->bannermenuitems?->sortBy('location');
        }
    }
@endphp
@if ($bannermain3 && $bannermain3->isNotEmpty())
    <section>
        <div class="large-12 columns container my-3 position-relative advertisement-02-hiding"
            style="flex-shrink: 0;">
            <div class="owl-carousel advertisement-02">
                @foreach ($bannermain3 as $item)
                    <div class="item">
                        <a href="{{ $item->link ?? '' }}">
                            <img class="rounded-2 object-fit-fill" height="200px"
                                src="{{ $item->image ? asset($item->image) : asset('storage/default.jpg') }}"
                                alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="position-absolute top-0 p-2 close-advertisement-02"
                style="z-index: 9; cursor: pointer; border-radius: 100%; left: 96%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-x-circle" viewBox="0 0 16 16"
                    style="background-color: rgba(255, 255, 255, 0.7); border-radius: 100%;">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>
        </div>
        <script>
            var owl = $('.advertisement-02');
            owl.owlCarousel({
                autoplay: true,
                margin: 10,
                loop: true,
                slideBy: 2,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                }
            })
            $('.close-advertisement-02').click(function() {
                var advertisement02Hiding = document.querySelector('.advertisement-02-hiding');
                advertisement02Hiding.style.display = 'none';
            });
        </script>
    </section>
@endif
