<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác minh Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-6">

            {{-- Thông báo thành công --}}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Xác minh Email</h4>
                </div>

                <div class="card-body">
                    <p class="mb-4 text-center">
                        Vui lòng xác minh email của bạn bằng cách nhấp vào liên kết trong email mà chúng tôi đã gửi.
                    </p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Gửi lại email xác minh
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted text-center">
                    Nếu bạn không nhận được email, hãy nhấn nút trên để gửi lại.
                </div>
            </div>

            {{-- Nút quay lại --}}
            <div class="text-center mt-4">
                <a href="{{ route('logout') }}" class="btn btn-outline-secondary">
                    ← Quay lại Điện Máy Xanh
                </a>
            </div>

        </div>
    </div>

</body>

</html>
