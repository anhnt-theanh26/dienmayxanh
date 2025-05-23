<div class="bg-white p-3 border mt-2">
    <p class="fw-bold">Yêu cầu đặc biệt</p>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="check-company-invoice">
        <label class="form-check-label" for="check-company-invoice">
            Xuất hóa đơn công ty
        </label>
    </div>
    <div class="invoice-company">

    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="check-other-request">
        <label class="form-check-label" for="check-other-request">
            Yêu cầu khác
        </label>
    </div>
    <div class="other-request">
    </div>
</div>
<script>
    var checkcompanyinvoice = document.querySelector('#check-company-invoice');
    checkcompanyinvoice.addEventListener('click', function() {
        if (this.checked) {
            $('.invoice-company').empty().html(`
                <input type="text" class="form-control my-3" name="company-name" placeholder="Tên công ty">
                <div id="title-warning-company-name" class="form-text text-danger"></div>
                <input type="text" class="form-control my-3" name="company-address" placeholder="Địa chỉ công ty">
                <div id="title-warning-company-address" class="form-text text-danger"></div>
                <input type="text" class="form-control my-3" name="tax-code" placeholder="Mã số thuế">
                <div id="title-warning-tax-code" class="form-text text-danger"></div>
                <input type="email" class="form-control my-3" name="email" placeholder="Email (Không bắt buộc)">
                `);
        } else {
            $('.invoice-company').empty();
        }
    });

    var checkotherrequest = document.querySelector('#check-other-request')
    checkotherrequest.addEventListener('click', function() {
        if (this.checked) {
            $('.other-request').empty().html(`
                <input type="text" class="form-control mt-3" name="other-request" placeholder="Yêu cầu khác">
                 <div id="title-warning-ofther-request" class="form-text text-danger"></div>
                `);
            let otherRequest = document.querySelector('input[name="other-request"]');
            if (otherRequest) {
                otherRequest.addEventListener('blur', function() {
                    if (this.value.trim() == '') {
                        $('#title-warning-ofther-request').empty().text('Vui lòng nhập yêu cầu khác');
                    } else {
                        $('#title-warning-ofther-request').empty();
                    }
                })
                otherRequest.addEventListener('input', function() {
                    if (this.value.trim() != '') {
                        $('#title-warning-ofther-request').empty();
                    }
                    if (this.value.trim() == '') {
                        $('#title-warning-ofther-request').empty().text('Vui lòng nhập yêu cầu khác');
                    }
                })
            }
        } else {
            $('.other-request').empty();
        }
    });
</script>
