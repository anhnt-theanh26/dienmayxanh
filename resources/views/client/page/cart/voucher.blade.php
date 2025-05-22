<div class="bg-white p-3 border mt-2">
    <div class="accordion" id="voucher">
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
        </p>
    </div>
</div>

