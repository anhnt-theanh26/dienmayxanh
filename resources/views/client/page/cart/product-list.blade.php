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
                            <a class="text-decoration-none text-black" href="">
                                {{ $item->name }}
                            </a>
                        </div>
                        <div class="product-content-name-left" style="max-width: 25%;">
                            <p class="text-danger">{{ number_format($item->price, 0, '.', '.') }}
                                đ</p>
                        </div>
                    </div>
                    <div class="product-content-variant py-1 pt-2">
                        <p class="bg-light p-2 rounded-2" style="width: fit-content;"> {{ $item->options->variant }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="px-3">
                            <a href="#" class="text-decoration-none text-secondary"
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
                {{ Cart::total() }}
            </span>
            <span>đ</span>
        </p>
    </div>
</div>
<script>
    $(document).on('click', '.qty-plus', function() {
        if (Number($(this).prev().val()) + 1 <= Number($(this).prev().attr('max'))) {
            Number($(this).prev().val(+Number(Number($(this).prev().val())) + 1));
        }
        if (Number($(this).prev().val()) > Number($(this).prev().attr('max'))) {
            Number($(this).prev().val(Number($(this).prev().attr('max'))));
        }
        let is = $(this).prev();
        update(is);
    });
    $(document).on('click', '.qty-minus', function() {
        if (Number($(this).next().val()) > 1) {
            Number($(this).next().val(+Number($(this).next().val()) - 1));
        }
        if (Number($(this).next().val()) > Number($(this).next().attr('max'))) {
            Number($(this).next().val(Number($(this).next().attr('max'))));
        }
        let is = $(this).next();
        update(is);
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
                $("#total-price").empty().text(response['price']);
                $("#estimated-total-product-price").empty().text(response['price']);
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
