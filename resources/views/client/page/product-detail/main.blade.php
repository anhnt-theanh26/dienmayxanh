@extends('layout.client')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    @if (!empty($product) && $product !== null)
        @include('client.page.product-detail.product-name')

        <section>
            <div class="container">
                <div class="row p-4">
                    @include('client.page.product-detail.introduce')
                    @include('client.page.product-detail.buy')
                </div>
            </div>
        </section>

        @include('client.page.product-detail.buy-together')
    @endif
@endsection
