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
        <div class="large-12 columns container my-3 position-relative advertisement-01-hiding" style="flex-shrink: 0; min-width: 1200px;">
            <div class="owl-carousel advertisement-01">
                <div class="item">
                    <img class="rounded-2 object-fit-contain"
                        src="{{ $bannermain1->first()->image ? asset($bannermain1->first()->image) : asset('storage/default.jpg') }}"
                        alt="">
                </div>
            </div>
            <div class="position-absolute top-0 p-2 close-advertisement-01"
                style="z-index: 10; cursor: pointer; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; left: 96%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
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
