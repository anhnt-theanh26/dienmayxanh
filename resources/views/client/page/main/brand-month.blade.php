@php
    $bannermain5 = null;
    if ($bannermenus !== null) {
        $bannerMenu = $bannermenus->skip(5)->first();
        if ($bannerMenu?->bannermenus) {
            $bannermain5 = $bannerMenu?->bannermenus?->first()?->bannermenuitems?->sortBy('location');
        }
    }
@endphp
@if ($bannermain5 && $bannermain5->isNotEmpty())
    <section>
        <div class="container">
            <h4 class="fw-bold py-4">{{$bannerMenu->bannermenus?->first()?->name}}</h4>
            <div class="owl-carousel advertisement-03">
                <div class="item">
                    <img src="{{ asset($bannermain5->first()->image) }}"
                        class="img-fluid rounded-3" alt="">
                </div>
            </div>
            <script>
                var owl = $('.advertisement-03');
                owl.owlCarousel({
                    margin: 10,
                    loop: false,
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
            </script>
        </div>
    </section>
@endif
