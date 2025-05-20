@if (Auth::check())
    <div class="rounded-2 p-2" data-bs-target="#address-delyvery" data-bs-toggle="modal"
        style="border: 1px dashed #2a83e9; background-color: rgb(241, 248, 254);">
        <p class="text-primary m-0 p-0" style="color: rgb(59, 130, 246)">
            Vui lòng cung cập thông tin nhận hàng
        </p>
        <p class="m-0 p-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt text-danger" viewBox="0 0 16 16">
                <path
                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
            {{ Auth::user() ? Auth::user()->address : '' }}
        </p>
    </div>
@else
    <a class="text-decoration-none text-black" href="{{ route('login.form') }}">
        <div class="rounded-2 p-2" style="border: 1px dashed #2a83e9; background-color: rgb(241, 248, 254);">
            <p class="text-primary m-0 p-0" style="color: rgb(59, 130, 246)">
                Vui lòng cung cập thông tin nhận hàng
            </p>
            <p class="m-0 p-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt text-danger" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                Đăng nhập để cập nhập thông tin
            </p>
        </div>
    </a>
@endif
<div class="modal modal-lg fade text-black" id="address-delyvery" aria-hidden="true"
    aria-labelledby="address-delyveryLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h1 class="modal-title fs-5" id="address-delyveryLabel">
                    Thông tin giao hàng
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Thông tin người đặt</h6>
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ho va Ten"
                        value="{{ Auth::user() ? Auth::user()->name : '' }}">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="phone" name="phone"
                        placeholder="So dien thoai"value="{{ Auth::user() ? Auth::user()->phone : '' }}">
                </div>
                <p class="m-0 p-0 text-secondary">Địa chỉ đang chọn:
                    <span class="text-black" id="selectedAddressDelivery">
                        {{ Auth::user() ? Auth::user()->address : '' }}
                    </span>
                </p>
                <input type="hidden" class="form-control" id="address" name="address">
                <p class="m-0 p-0 text-secondary py-2">Thay đổi địa chỉ khác:</p>
                <div class="mb-3">
                    <input type="text" class="form-control" id="anotherAddress" name="anotherAddress"
                        placeholder="Nhap dia chi">
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 py-2 pt-3">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Xac
                        nhan</button>
                </div>
            </div>
        </div>
    </div>
</div>
