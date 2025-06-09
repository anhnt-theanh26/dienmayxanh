@if ($setting)
    {!! $setting->layout_not_found !!}
@else
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ERROR 404</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </head>

    <body style="font-family: 'Times New Roman', Times, serif;">
        <div class="container">
            <div class="" style="display: flex; align-items: center; justify-content: center; height: 100vh;">
                <div style="width: 500px;">
                    <img width="500" src="https://www.dienmayxanh.com/html/%C4%90MX/destop/images/404.png"
                        alt="404">
                </div>
                <div style="width: 500px;" class="p-4">
                    <p class="text-center" style="font-size: 48px; font-weight: 400;">Xin lỗi, chúng tôi không tìm thấy
                        trang mà bạn cần!</p>
                    <div class="d-flex justify-content-around align-items-center">
                        <div class="text-center">
                            <p class="m-0 pb-1" style="font-size: 12px">Trở về trang chủ<br>Điện máy Xanh</p>
                            <a href="{{ route('index') }}">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    style="width: 140px; height: 40px; font-size: 12px;">
                                    Điện máy XANH
                                </button>
                            </a>
                        </div>
                        <div class="text-center">
                            <p class="m-0 pb-1" style="font-size: 12px">Gọi hỗ trợ<br>(8h00 - 21h30)</p>
                            <a href="">
                                <button type="button" class="btn btn-primary rounded-pill fw-bold"
                                    style="width: 140px; height: 40px;">0348022004</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endif
