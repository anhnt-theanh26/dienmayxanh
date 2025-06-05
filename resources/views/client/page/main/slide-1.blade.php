@php
    $bannermain1 = null;
    if (!empty($bannermenus) && $bannermenus !== null) {
        $bannerMenu = $bannermenus->skip(1)->first();
        if ($bannerMenu?->bannermenus) {
            $bannermain1 = $bannerMenu?->bannermenus?->first()?->bannermenuitems?->sortBy('location');
        }
    }
@endphp

@if ($bannermain1 && $bannermain1->isNotEmpty())
    <section>
        <div class="large-12 columns container my-3 position-relative advertisement-01-hiding"
            style="flex-shrink: 0;">
            <div class="owl-carousel advertisement-01">
                <div class="item">
                    <a href="{{ $bannermain1->first()->link ?? '' }}">
                        <img class="rounded-2 object-fit-contain"
                            src="{{ $bannermain1->first()->image ? asset($bannermain1->first()->image) : asset('storage/default.jpg') }}"
                            alt="">
                    </a>
                </div>
            </div>
            <div class="position-absolute top-0 p-2 close-advertisement-01"
                style="z-index: 9; cursor: pointer; border-radius: 100%; left: 96%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-x-circle" viewBox="0 0 16 16" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 100%;">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>
        </div>
        <script>
            var owl = $('.advertisement-01');
            owl.owlCarousel({
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
            $('.close-advertisement-01').click(function() {
                var advertisement01Hiding = document.querySelector('.advertisement-01-hiding');
                advertisement01Hiding.style.display = 'none';
            });
        </script>
    </section>
@endif
