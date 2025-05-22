<script>
    var voucherForm = document.querySelector('.voucher-form');
    document.querySelectorAll('.btnradio').forEach(element => {
        element.addEventListener('click', () => {
            if (element.value == 'enter') {
                voucherForm.innerHTML = `
                    <div class="d-flex p-3">
                        <input class="form-control me-2" type="search" placeholder="Voucher" name="voucher" style="max-width: 80%;" />
                        <a class="btn btn-outline-success" onclick="discount('enter')" style="max-width: 20%;">
                            Áp dụng
                        </a>
                    </div>
                `;
            }
            if (element.value == 'available') {
                voucherForm.innerHTML = `
                    <div class="d-flex p-3">
                        <select class="form-select me-2" aria-label="Default select example" name="voucher"
                            style="max-width: 80%;">
                            @foreach ($vouchers as $item)
                                @if (
                                    $item->users == null &&
                                        $item->products == null &&
                                        Cart::total(0, '', '') >= $item->discount_condition &&
                                        $item->max_use > 0 && 
                                        $item->start_date < now()->toDateTimeString() && $item->end_date >= now()->toDateTimeString()
                                        )
                                    <option value="{{ $item->promo_code }}">
                                        Giảm: {{ $item->discount_percentage }}% | Tối đa: {{ number_format($item->max_discount, 0, '.', '.') }}đ |
                                        HSD: {{ \Carbon\Carbon::parse($item->start_end)->format('d/m/Y H:i') }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <a class="btn btn-outline-success" onclick="discount('available')" style="max-width: 20%;">
                            Áp dụng
                        </a>
                    </div>
                `;
            }
        });
    });

    function discount(type) {
        let code = '';
        if (type == 'enter') {
            code = document.querySelector('input[name="voucher"]').value;
            if (code == '') {
                alertify.error('Vui lòng nhập voucher!');
                return;
            }
        }
        if (type == 'available') {
            code = document.querySelector('select[name="voucher"]').value;
            if (code == '') {
                alertify.error('Voucher không khả dụng!');
                return;
            }
        }
        $.ajax({
                url: "{{ route('cart.discount', ['code' => ':code']) }}".replace(':code', code),
                type: "GET",
                data: {
                    type: type,
                },
            })
            .done((response) => {
                if (response['status'] == true) {
                    alertify.success(response['title']);
                    if (response['type'] == 'available') {
                        $('#price-discount').empty().text(response['discount'].toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $('#total-price').empty().text(response['total'].toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                    }
                    if(response['type'] == 'enter'){
                        console.log(response);
                    }
                }
                if (response['status'] == false) {
                    alertify.error(response['title']);
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                alertify.error('Giảm giá giỏ hàng thất bại!');
                console.error("Error cart:", textStatus, errorThrown);
            });
    }

    document.querySelectorAll('.payment-methods').forEach(function(payment) {
        payment.addEventListener('change', function() {
            if (this.value == 'online') {
                console.log('online');
            }
            if (this.value == 'offline') {
                console.log('offline');
            }
        });
    });
    if (document.querySelector('#anotherAddress')) {
        document.querySelector('#anotherAddress').addEventListener('input', function() {
            document.querySelector('#selectedAddressDelivery').textContent = this.value;
            document.querySelector('#address').value = this.value;
        });
    }


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
