@php
    $bannermain6 = null;
    if ($bannermenus !== null) {
        $bannerMenu = $bannermenus->skip(6)->first();
        if ($bannerMenu?->bannermenus) {
            $bannermain6 = $bannerMenu?->bannermenus?->first()?->bannermenuitems?->sortBy('location');
        }
    }
@endphp
@if ($bannermain6 && $bannermain6->isNotEmpty())
    <section>
        <div class="container">
            <h4 class="fw-bold py-4">{{ $bannerMenu->bannermenus?->first()?->name }}</h4>
            <div class="owl-carousel advertisement-03">
                @foreach ($bannermain6 as $item)
                    <div class="item">
                        <img class="rounded-2 object-fit-contain" style="height: 450px"
                            src="{{ $item->image ? asset($item->image) : asset('storage/default.jpg') }}" alt="">
                    </div>
                @endforeach
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
                            items: 4
                        }
                    }
                })
            </script>
        </div>
    </section>
@endif
