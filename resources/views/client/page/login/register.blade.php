@extends('layout.client')

@section('title', 'Đăng ký')

@section('content')
    <section>
        <div class="container p-5">
            <div class="row p-5">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <img src="https://cdn.tgdd.vn/2022/10/banner/TGDD-540x270-1.png" class="img-fluid" alt="">
                </div>
                <div class="col-6 p-5 bg-white rounded-4 shadow">
                    <form action="{{ route('register.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <p style="font-size: 24px; font-weight: 100;">Đăng ký</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill" id="name" name="name"
                                placeholder="Họ tên" required value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control rounded-pill" id="email" name="email"
                                placeholder="Email" required value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill" id="phone" name="phone"
                                placeholder="Số điện thoại" required value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control rounded-pill" id="password" name="password"
                                placeholder="********" required value="{{ old('password') }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control rounded-pill" id="image" name="image" required
                                value="{{ old('image') }}">
                            <img src="" alt="" width="50px" id="img" class="py-1"
                                style="display: none">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control rounded-pill" id="birthday" name="birthday"required
                                value="{{ old('birthday') }}">
                            @error('birthday')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill" id="address" name="address"
                                placeholder="Địa chỉ"required value="{{ old('address') }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <div class="mT7wZj eRtniP">Bạn đã có tài khoản ?
                                <a href="{{ route('login.form') }}">Đăng nhập</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        // 1 ảnh
        var image = document.querySelector('#image');
        var img = document.querySelector('#img');
        image.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
            img.style.display = 'block';
            img.style.margin = '10px';
            img.style.borderRadius = '10px';
        })
    </script>
@endsection
