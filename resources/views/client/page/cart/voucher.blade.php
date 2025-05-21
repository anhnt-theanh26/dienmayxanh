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

                <div class="d-flex p-3">
                    {{-- <input class="form-control me-2" type="search" placeholder="Voucher" style="max-width: 80%;" /> --}}
                    <select class="form-select" aria-label="Default select example" name="voucher">
                        <option selected>Voucher</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <button class="btn btn-outline-success" type="submit" style="max-width: 20%;">
                        Áp dụng
                    </button>
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
            20.000 đ
        </p>
    </div>
    <div class="d-flex justify-content-between">
        <p class="">
            Tổng tiền
        </p>
        <p class="fw-bold">
            <span id="total-price">{{ Cart::total() }}</span>
            <span>đ</span>
        </p>
    </div>
</div>
