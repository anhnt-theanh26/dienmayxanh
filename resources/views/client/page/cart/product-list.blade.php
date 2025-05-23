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
                            <a class="text-decoration-none text-secondary btn" style="cursor: pointer;"
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
<script>
    function deleteItemCart(id) {
        $.ajax({
                url: "{{ route('cart.delete-item-cart', ['id' => ':id']) }}".replace(':id', id),
                type: "GET",
            })
            .done((response) => {
                $("#change-item-cart").empty().text(response['total'].toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $("#cart-list").empty().html(response['html']);
                if (response['status'] == true) {
                    alertify.success(response['title']);
                }
                if (response['status'] == false) {
                    alertify.error(response['title']);
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Xóa khỏi giỏ hàng thất bại!');
                console.error("Error adding to cart:", textStatus, errorThrown);
            });
    }
    $(document).on('click', '.qty-plus', function() {
        let is = $(this).prev();
        if (Number($(this).prev().val()) + 1 <= Number($(this).prev().attr('max'))) {
            Number($(this).prev().val(+Number(Number($(this).prev().val())) + 1));
            update(is);
        }
        if (Number($(this).prev().val()) > Number($(this).prev().attr('max'))) {
            Number($(this).prev().val(Number($(this).prev().attr('max'))));
            update(is);
        }
    });
    $(document).on('click', '.qty-minus', function() {
        let is = $(this).next();
        if (Number($(this).next().val()) > 1) {
            Number($(this).next().val(+Number($(this).next().val()) - 1));
            update(is);
        }
        if (Number($(this).next().val()) > Number($(this).next().attr('max'))) {
            Number($(this).next().val(Number($(this).next().attr('max'))));
            update(is);
        }
    });
    $(document).on('input', '.qty', function() {
        if (Number($(this).val()) > Number($(this).attr('max'))) {
            Number($(this).val(Number($(this).attr('max'))));
        }
        if (Number($(this).val()) < Number($(this).attr('min'))) {
            Number($(this).val(Number($(this).attr('min'))));
        }
        let is = $(this);
        update(is);
    });

    function update(is) {
        $.ajax({
                url: "{{ route('cart.update-item-cart', ['id' => ':id']) }}".replace(':id',
                    is.data("id")),
                type: "GET",
                data: {
                    quantity: is.val(),
                },
            })
            .done((response) => {
                $("#change-item-cart").empty().text(response['total']);
                $('#total-price').empty().text((response['price'] + 20000).toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $("#estimated-total-product-price").empty().text(response['price'].toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $("#estimated-total-product-quantity").empty().text(response['total']);
                $("#delivery-information").empty().html(response['html']);
                if (response['status'] == true) {
                    alertify.success(response['title']);
                }
                if (response['status'] == false) {
                    alertify.error(response['title']);
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Xóa khỏi giỏ hàng thất bại!');
                console.error("Error adding to cart:", textStatus, errorThrown);
            });
    }
</script>
