<div class="product-list pt-4">
    @if (Cart::content())
        @foreach (Cart::content() as $item)
            <div class="product-item d-flex py-3">
                <div class="product-img" style="width: 15%;">
                    <img width="100%" class="object-fit-contain" src="{{ asset($item->options->image) }}"
                        alt="{{ $item->name }}">
                </div>
                <div class="product-content px-2" style="width: 85%;">
                    <div class="product-content-name d-flex justify-content-between">
                        <div class="product-content-name-left" style="max-width: 75%;">
                            <a class="text-decoration-none text-black"
                                href="{{ route('product-detail', ['slug' => $item->options->product->slug]) }}">
                                {{ $item->name }}
                            </a>
                        </div>
                        <div class="product-content-name-left" style="max-width: 25%;">
                            <p class="text-danger">{{ number_format($item->price, 0, '.', '.') }}
                                VND</p>
                        </div>
                    </div>
                    <div class="product-content-variant py-1 pt-2">
                        <p class="bg-light p-2 rounded-2" style="width: fit-content;"> {{ $item->options->variant }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="px-3">
                            <a class="text-decoration-none text-secondary" style="cursor: pointer;"
                                onclick="deleteItemCart('{{ $item->rowId }}')">Xóa</a>
                        </div>
                        <div class="quantity-control">
                            <input type="button" value="-" class="qty-minus">
                            <input type="number" value="{{ $item->qty }}" class="qty" min="1"
                                max="{{ $item->options->quantity }}" data-id="{{ $item->rowId }}">
                            <input type="button" value="+" class="qty-plus">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    @endif
</div>
<div class="summary">
    <div class="d-flex justify-content-between">
        <p>
            Tạm tính (<span id="estimated-total-product-quantity">{{ Cart::count() }}</span> sản phẩm):
        </p>
        <p>
            <span id="estimated-total-product-price">
                {{ number_format(Cart::total(0, '', ''), 0, '.', '.') }} VND
            </span>
        </p>
    </div>
</div>