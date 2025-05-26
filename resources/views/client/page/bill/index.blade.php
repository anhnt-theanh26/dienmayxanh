@extends('layout.client')

@section('title', 'Đơn hàng')

@section('content')
    <section>
        <div class="container" style="flex-shrink: 0; min-width: 1200px;">
            <div class="row p-3">
                <div class="col-3 m-0 p-0">
                    <div class="user d-flex py-2">
                        <div class="">
                            <img width="30" height="30" class="object-fit-cover rounded-pill"
                                src="{{ Auth::check() ? asset(Auth::user()->image) : '' }}" alt="">
                        </div>
                        <div class="px-5">
                            <p class="m-0 p-0" style="font-weight: 600; font-size: 14px;">
                                {{ Auth::check() ? Auth::user()->name : '' }}</p>
                            <span class="text-secondary" style="font-size: 14px; cursor: pointer;"
                                onclick="document.getElementById('v-pills-profile-tab').click()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                </svg>
                                Sửa hồ sơ
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-start" style="width: 100%;">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" style="width: 100%;"
                            aria-orientation="vertical">
                            <button class="nav-link text-start active" style="width: 100%;" id="v-pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-profile" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Tài khoản của tôi
                            </button>
                            <button class="nav-link text-start" style="width: 100%;" id="v-pills-messages-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-messages" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                                    <path
                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                                </svg>
                                Đơn mua
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <ul class="nav nav-tabs" id="myTabUser" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="true">Hồ sơ</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="change-password-tab" data-bs-toggle="tab"
                                        data-bs-target="#change-password-tab-pane" type="button" role="tab"
                                        aria-controls="change-password-tab-pane" aria-selected="false">Đổi mật khẩu</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabUserContent">
                                <div class="tab-pane fade show active bg-white" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="p-5">
                                        <h4>Hồ sơ của tôi</h4>
                                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                                        <hr>
                                        <form action="{{ route('profile.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ Auth::check() ? Auth::user()->name : '' }}"
                                                    placeholder="Tên...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ Auth::check() ? Auth::user()->email : '' }}"
                                                    placeholder="Email...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ Auth::check() ? Auth::user()->phone : '' }}"
                                                    placeholder="Số điện thoại...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="date" class="form-control" id="birthday"
                                                    value="{{ Auth::check() ? Auth::user()->birthday : '' }}"
                                                    name="birthday" placeholder="Ngày sinh...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ Auth::check() ? Auth::user()->address : '' }}"
                                                    placeholder="Địa chỉ...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" class="form-control" id="image"name="image"
                                                    placeholder="Ảnh đại diện...">
                                                <img src="{{ Auth::check() ? asset(Auth::user()->image) : '' }}"
                                                    alt="" width="50px" id="img" class="py-1">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="change-password-tab-pane" role="tabpanel"
                                    aria-labelledby="change-password-tab" tabindex="0">
                                    <form action="{{ route('profile.password') }}" method="post">
                                        @csrf
                                        <div class="p-5">
                                            <div class="mb-3">
                                                <div class="form-password-toggle">
                                                    <label class="form-label" for="basic-default-password12">
                                                        Mật khẩu cũ
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control"
                                                            id="basic-default-password12" value=""
                                                            placeholder="············"
                                                            aria-describedby="basic-default-password2"
                                                            name="old_password">
                                                        <span id="basic-default-password2"
                                                            class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                                                <path
                                                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                                                <path
                                                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-password-toggle">
                                                    <label class="form-label" for="basic-default-password12">
                                                        Mật khẩu mới
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control"
                                                            id="basic-default-password12" value=""
                                                            placeholder="············"
                                                            aria-describedby="basic-default-password2"
                                                            name="new_password">
                                                        <span id="basic-default-password2"
                                                            class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                                                <path
                                                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                                                <path
                                                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-password-toggle">
                                                    <label class="form-label" for="basic-default-password12">
                                                        Xác nhận mật khẩu
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control"
                                                            id="basic-default-password12" value=""
                                                            placeholder="············"
                                                            aria-describedby="basic-default-password2"
                                                            name="confirm_password">
                                                        <span id="basic-default-password2"
                                                            class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                                                <path
                                                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                                                <path
                                                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <ul class="nav nav-tabs" id="myTabBill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                        data-bs-target="#all-tab-pane" type="button" role="tab"
                                        aria-controls="all-tab-pane" aria-selected="true">Tất cả</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="waiting-payment-tab" data-bs-toggle="tab"
                                        data-bs-target="#waiting-payment-tab-pane" type="button" role="tab"
                                        aria-controls="waiting-payment-tab-pane" aria-selected="false">Chờ thanh
                                        toán</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="transport-tab" data-bs-toggle="tab"
                                        data-bs-target="#transport-tab-pane" type="button" role="tab"
                                        aria-controls="transport-tab-pane" aria-selected="false">Vận chuyển</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="waiting-delivery-tab" data-bs-toggle="tab"
                                        data-bs-target="#waiting-delivery-tab-pane" type="button" role="tab"
                                        aria-controls="waiting-delivery-tab-pane" aria-selected="false">Chờ giao
                                        hàng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="complete-tab" data-bs-toggle="tab"
                                        data-bs-target="#complete-tab-pane" type="button" role="tab"
                                        aria-controls="complete-tab-pane" aria-selected="false">Hoàn thành</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="canceled-tab" data-bs-toggle="tab"
                                        data-bs-target="#canceled-tab-pane" type="button" role="tab"
                                        aria-controls="canceled-tab-pane" aria-selected="false">Đã hủy</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="refund-tab" data-bs-toggle="tab"
                                        data-bs-target="#refund-tab-pane" type="button" role="tab"
                                        aria-controls="refund-tab-pane" aria-selected="false">Trả hàng hoàn
                                        tiền</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabBillContent">
                                <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel"
                                    aria-labelledby="all-tab" tabindex="0">
                                    <div class="pt-2">
                                        <div class="p-3 pt-4 bg-white">
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsnzik7bb0zo67_tn"
                                                            width="80" alt="">
                                                        <div class="px-2">
                                                            <p class="p-0 m-0">Balo Nam thời trang fom rộng đi học, về
                                                                quên, du
                                                                lịch_BL3</p>
                                                            <p class="p-0 m-0 text-secondary" style="font-size: 14px">Phân
                                                                loại
                                                                hàng: Đen xịn_BL3,,không phụ kiện</p>
                                                            <p class="p-0 m-0">x1</p>
                                                        </div>
                                                    </div>
                                                    <div style="font-weight: 500">
                                                        <span
                                                            class="text-secondary text-decoration-line-through">₫200.000</span>-
                                                        <span class="text-danger">₫200.000</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsnzik7bb0zo67_tn"
                                                            width="80" alt="">
                                                        <div class="px-2">
                                                            <p class="p-0 m-0">Balo Nam thời trang fom rộng đi học, về
                                                                quên, du
                                                                lịch_BL3</p>
                                                            <p class="p-0 m-0 text-secondary" style="font-size: 14px">Phân
                                                                loại
                                                                hàng: Đen xịn_BL3,,không phụ kiện</p>
                                                            <p class="p-0 m-0">x1</p>
                                                        </div>
                                                    </div>
                                                    <div style="font-weight: 500">
                                                        <span
                                                            class="text-secondary text-decoration-line-through">₫200.000</span>-
                                                        <span class="text-danger">₫200.000</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <p>Thành tiền: </p>
                                                <p class="text-danger px-1" style="font-size: 24px"> ₫119.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="p-3 pt-4 bg-white">
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsnzik7bb0zo67_tn"
                                                            width="80" alt="">
                                                        <div class="px-2">
                                                            <p class="p-0 m-0">Balo Nam thời trang fom rộng đi học, về
                                                                quên, du
                                                                lịch_BL3</p>
                                                            <p class="p-0 m-0 text-secondary" style="font-size: 14px">Phân
                                                                loại
                                                                hàng: Đen xịn_BL3,,không phụ kiện</p>
                                                            <p class="p-0 m-0">x1</p>
                                                        </div>
                                                    </div>
                                                    <div style="font-weight: 500">
                                                        <span
                                                            class="text-secondary text-decoration-line-through">₫200.000</span>-
                                                        <span class="text-danger">₫200.000</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lsnzik7bb0zo67_tn"
                                                            width="80" alt="">
                                                        <div class="px-2">
                                                            <p class="p-0 m-0">Balo Nam thời trang fom rộng đi học, về
                                                                quên, du
                                                                lịch_BL3</p>
                                                            <p class="p-0 m-0 text-secondary" style="font-size: 14px">Phân
                                                                loại
                                                                hàng: Đen xịn_BL3,,không phụ kiện</p>
                                                            <p class="p-0 m-0">x1</p>
                                                        </div>
                                                    </div>
                                                    <div style="font-weight: 500">
                                                        <span
                                                            class="text-secondary text-decoration-line-through">₫200.000</span>-
                                                        <span class="text-danger">₫200.000</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <p>Thành tiền: </p>
                                                <p class="text-danger px-1" style="font-size: 24px"> ₫119.000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="waiting-payment-tab-pane" role="tabpanel"
                                    aria-labelledby="waiting-payment-tab" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="transport-tab-pane" role="tabpanel"
                                    aria-labelledby="transport-tab bg-white" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="waiting-delivery-tab-pane" role="tabpanel"
                                    aria-labelledby="waiting-delivery-tab" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="complete-tab-pane" role="tabpanel"
                                    aria-labelledby="complete-tab" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="canceled-tab-pane" role="tabpanel"
                                    aria-labelledby="canceled-tab" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade bg-white" id="refund-tab-pane" role="tabpanel"
                                    aria-labelledby="refund-tab" tabindex="0">
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="min-height: 600px">
                                        <div class="">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142603.png"
                                                    width="100px" alt="">
                                            </div>
                                            <div class="">
                                                Chưa có đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // 1 ảnh
        var image = document.querySelector('#image');
        var img = document.querySelector('#img');
        image.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        })
    </script>
@endsection
