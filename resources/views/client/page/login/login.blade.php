@extends('layout.client')

@section('title', 'Đăng nhập')

@section('content')
    <section>
        <div class="container p-5">
            <div class="row p-5">
                <div class="col-6">
                    <img src="https://cdn.tgdd.vn/2022/10/banner/TGDD-540x270-1.png" class="img-fluid" alt="">
                </div>
                <div class="col-6 p-5 bg-white rounded-4 shadow">
                    <form action="{{ route('login.submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <p style="font-size: 24px; font-weight: 100;">Đăng nhập</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill" id="name" name="name"
                                placeholder="Email/Số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control rounded-pill" id="password" name="password"
                                placeholder="********" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <div class="mT7wZj eRtniP">Bạn mới biết đến ?
                                <a href="{{ route('register.form') }}">Đăng ký</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
