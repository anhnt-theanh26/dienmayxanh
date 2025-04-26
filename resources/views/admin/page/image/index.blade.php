@extends('layout.admin')

@section('title', 'Thêm mới')

@section('css')
    {{-- Chỉ cần include 1 lần --}}
    @include('ckfinder::setup')
@endsection

@section('content')
    <div id="ckfinder-widget"></div> {{-- Đây là nơi CKFinder sẽ hiển thị --}}

    <script>
        // Đợi DOM load xong rồi mới khởi tạo CKFinder
        document.addEventListener("DOMContentLoaded", function() {
            CKFinder.widget('ckfinder-widget', {
                width: '100%',
                height: 700
            });
        });
    </script>
@endsection

@section('js')
    {{-- Đảm bảo đường dẫn này đúng nếu bạn cài CKFinder thủ công --}}
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>

    <script>
        CKFinder.config({
            connectorPath: '/ckfinder/connector' // Đảm bảo path này đúng với cấu hình server của bạn
        });
    </script>
@endsection
