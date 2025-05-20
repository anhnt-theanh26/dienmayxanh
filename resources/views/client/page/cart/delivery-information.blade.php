<div class="bg-white p-3 border mt-2">
    <div id="delivery-information" class="delivery-information">
        <p class="fw-bold">Thông tin nhận hàng:</p>
        <ul class="list-group">
            @if (Cart::content())
                @foreach (Cart::content() as $item)
                    <li class="list-group-item d-flex">
                        <div class="product-img" style="width: 10%;">
                            <img width="100%" class="object-fit-contain" src="{{ asset($item->options->image) }}"
                                alt="{{ $item->name }}">
                        </div>
                        <div class="px-2" style="width: 90%;">
                            <a class="text-decoration-none text-black"
                                href="/dan-loa-dvd/loa-karaoke-xach-tay-sumico-hexagon">
                                {{ $item->name }}
                            </a>
                            <div class="">
                                <p class="text-secondary" style="padding-right: 20px; float: left;">
                                    {{ $item->options->variant }}
                                </p>
                                <p class="text-secondary" style="padding-right: 20px; float: left;">
                                    SL: {{ $item->qty }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
