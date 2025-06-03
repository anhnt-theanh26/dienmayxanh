@extends('layout.client')

@section('title', 'Bài viết')
@section('css')
@endsection

@section('content')
    <section>
        <div class="bg-white rounded-3">
            <div class="container">
                <div class="py-2">
                    <p class="py-2 m-0 p-0" style="font-size: 14px">
                        <a class="text-secondary text-decoration-none" href="{{ route('index') }}">
                            Trang chủ
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                        </svg>
                        <span class="text-black">
                            Khuyến mãi
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                        </svg>
                        <span class="text-black">
                            Tin khuyến mãi
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')


@endsection
