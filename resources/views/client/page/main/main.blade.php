@extends('layout.client')

@section('title', 'Trang chủ')

@section('content')
    <!-- slide 1 -->
    @include('client.page.main.slide-1')
    <!-- hết slide 1 -->

    <!-- danh mục  -->
    @include('client.page.main.category')

    <!--hết danh mục  -->

    <!-- khuyến mãi online  -->
    @include('client.page.main.sale-online')
    <!-- hết khuyến mãi online  -->

    <!-- slide 2 -->
    @include('client.page.main.slide-2')
    <!-- hết slide 2 -->

    <!-- gợi ý cho bạn  -->
    @include('client.page.main.tips-for-you')
    <!-- hết gợi ý cho bạn  -->

    <!-- sản phẩm đặc quyền  -->
    @include('client.page.main.privilege')
    <!-- hết sản phẩm đặc quyền  -->

    <!-- tháng thương hiệu  -->
    @include('client.page.main.brand-month')
    <!-- hết tháng thương hiệu  -->

    <!-- Gian hàng ưu đãi  -->
    @include('client.page.main.endow')
    <!-- hết Gian hàng ưu đãi  -->

    <!-- chủ đề  -->
    @include('client.page.main.topic')
    <!-- hết chủ đề  -->

    <!-- mọi người cũng tìm kiếm -->
    @include('client.page.main.everyone-searche')
    <!-- hết mọi người cũng tìm kiếm -->
@endsection
