<div class="bg-white p-3 border mt-2">
    {{-- <div class="accordion" id="voucher">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#voucher-sale" aria-expanded="false" aria-controls="voucher-sale">
                    Sử dụng mã giảm giá
                </button>
            </h2>
            <div id="voucher-sale" class="accordion-collapse collapse" data-bs-parent="#voucher">
                <div class="btn-group pt-3" role="group" aria-label="Basic radio toggle button group"
                    style="width: 100%;">
                    <input type="radio" class="btn-check btnradio" name="btnradio" id="enter" value="enter"
                        autocomplete="off">
                    <label class="btn btn-outline-primary" for="enter">Nhập voucher</label>
                    <input type="radio" class="btn-check btnradio" name="btnradio" id="available" value="available"
                        autocomplete="off">
                    <label class="btn btn-outline-primary" for="available">Voucher khả dụng</label>
                </div>
                <div class="voucher-form">
                </div>
            </div>
        </div>
    </div> --}}
    <div class="accordion accordion-flush" id="voucher">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#voucher-sale" aria-expanded="false" aria-controls="voucher-sale">
                    Sử dụng mã giảm giá
                </button>
            </h2>
            <div id="voucher-sale" class="accordion-collapse collapse" data-bs-parent="#voucher">
                <div class="accordion-body m-0 p-0">
                    <div class="btn-group pt-4" role="group" aria-label="Basic radio toggle button group"
                        style="width: 100%;">
                        <input type="radio" class="btn-check btnradio" name="btnradio" id="enter" value="enter"
                            autocomplete="off">
                        <label class="btn btn-outline-primary" for="enter">Nhập voucher</label>
                        <input type="radio" class="btn-check btnradio" name="btnradio" id="available"
                            value="available" autocomplete="off">
                        <label class="btn btn-outline-primary" for="available">Voucher khả dụng</label>
                    </div>
                    <div class="voucher-form">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <p class="">
            Phí giao hàng
        </p>
        <p class="">
            20.000 VND
        </p>
    </div>
    <div class="d-flex justify-content-between">
        <p class="">
            Giảm giá
        </p>
        <p class="">
            <span id="price-discount">0 VND</span>
        </p>
    </div>
    <div class="d-flex justify-content-between">
        <p class="">
            Tổng tiền
        </p>
        <p class="fw-bold">
            <span id="total-price">{{ number_format(Cart::total(0, '', '') + 20000, 0, '.', '.') }} VND</span>
            <input id="total-price-hidden" class="form-control me-2" type="hidden" placeholder="total-price"
                name="total-price" value="{{ Cart::total(0, '', '') + 20000 }}" />
        </p>
    </div>
</div>

<script>
    var voucherForm = document.querySelector('.voucher-form');
    document.querySelectorAll('.btnradio').forEach(element => {
        element.addEventListener('click', () => {
            if (element.value == 'enter') {
                console.log('enter');
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
                console.log('available');
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
                                        $item->start_date < now()->toDateTimeString() &&
                                        $item->end_date >= now()->toDateTimeString())
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
                        $('#total-price-hidden').val(response['total']);
                    }
                    if (response['type'] == 'enter') {
                        $('#price-discount').empty().text(response['discount'].toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $('#total-price').empty().text(response['total'].toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $('#total-price-hidden').val(response['total']);
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
</script>
