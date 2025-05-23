<div class="bg-white p-3 border mt-2">
    <p class="fw-bold">Hình thức thanh toán:</p>
    <div class="form-check py-1">
        <input class="form-check-input payment-methods" type="radio" name="payment" value="offline" id="offline" checked>
        <label class="form-check-label" for="offline">
            Thanh toán tiền mặt khi nhận hàng
        </label>
    </div>
    <div class="form-check py-1">
        <input class="form-check-input payment-methods" type="radio" name="payment" value="online" id="online">
        <label class="form-check-label" for="online">
            Chuyển khoản ngân hàng
        </label>
    </div>
    <p class="m-0 p-0 py-1">Chính sách bảo mật:</p>
    <div class="form-check">
        <input type="checkbox" class="form-check-input agree" id="policy" checked>
        <label class="form-check-label" for="policy">Tôi đồng ý với
            <a target="_blank" href="https://www.dienmayxanh.com/chinh-sach-xu-ly-du-lieu-ca-nhan"
                class="text-decoration-none">Chính sách xử lý dữ liệu cá
                nhân</a>
            của Điện Máy Xanh</label>
    </div>
    <div class="d-grid gap-2 py-2 pt-3">
        @if (Auth::check())
            <button class="btn btn-order-product text-white" type="submit"
                style="background-color: rgb(252, 118, 0)">Đặt hàng</button>
        @else
            <a href="{{ route('login.form') }}" class="btn btn-order-product bg-primary text-white">Đăng
                nhập</a>
        @endif
    </div>
</div>
<script>
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

    let formordersubmit = document.querySelector('.form-order-submit');
    formordersubmit.addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkcompanyinvoice.checked) {
            let companyName = document.querySelector('input[name="company-name"]');
            if (companyName.value.trim() == '') {
                $('#title-warning-company-name').empty().text('Vui lòng nhập tên công ty');
            } else {
                $('#title-warning-company-name').empty();
            }
            let companyAddress = document.querySelector('input[name="company-address"]');
            if (companyAddress.value.trim() == '') {
                $('#title-warning-company-address').empty().text('Vui lòng nhập địa chỉ công ty');
            } else {
                $('#title-warning-company-address').empty();
            }
            let taxCode = document.querySelector('input[name="tax-code"]');
            if (taxCode.value.trim() == '') {
                $('#title-warning-tax-code').empty().text('Vui lòng nhập mã số thuế');
            } else {
                $('#title-warning-tax-code').empty();
            }
        }
        if (checkotherrequest.checked) {
            let otherRequest = document.querySelector('input[name="other-request"]');
            if (otherRequest.value.trim() == '') {
                $('#title-warning-ofther-request').empty().text('Vui lòng nhập yêu cầu khác');
            }
        }
        formordersubmit.submit();
    })
</script>
