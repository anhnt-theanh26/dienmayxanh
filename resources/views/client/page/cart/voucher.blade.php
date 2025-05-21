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
                {{-- <div class="voucher-form">
                    <div class="d-flex p-3">
                        <select class="form-select me-2" aria-label="Default select example" name="voucher"
                            style="max-width: 80%;">
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
                <div class="voucher-form">
                    <div class="d-flex p-3">
                        <input class="form-control me-2" type="search" placeholder="Voucher" style="max-width: 80%;" />
                        <button class="btn btn-outline-success" type="submit" style="max-width: 20%;">
                            Áp dụng
                        </button>
                    </div>
                </div> --}}
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

<script>
    let voucherForm = document.querySelector('.voucher-form');
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
                            <option value="1">
                                Giảm: 20% | Tối đa: 100.000đ | Còn lại: 9 lần
                            </option>
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
        let voucher = '';
        if (type == 'enter') {
            voucher = document.querySelector('input[name="voucher"]').value;
            if (voucher == '') {
                alertify.error('Vui lòng nhập voucher!');
                return;
            }
        }
        if (type == 'available') {
            voucher = document.querySelector('select[name="voucher"]').value;
            if (voucher == '') {
                alertify.error('Voucher không khả dụng!');
                return;
            }
        }
        console.log(type);
        console.log(voucher);
        $.ajax({}).done(function(data) {})
    }
</script>
