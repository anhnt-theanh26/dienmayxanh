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
        <div class="large-12 columns container my-3 position-relative advertisement-02-hiding" style="flex-shrink: 0; min-width: 1200px;">
            <div class="owl-carousel advertisement-02">
                @foreach ($bannermain3 as $item)
                    <div class="item">
                        <img class="rounded-2 object-fit-fill" height="200px"
                            src="{{ $item->image ? asset($item->image) : asset('storage/default.jpg') }}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="position-absolute top-0 p-2 close-advertisement-02"
                style="z-index: 10; cursor: pointer; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; left: 96%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
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
