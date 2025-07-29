@extends('layout.client')

@section('seo')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection

@section('css')
@endsection

@section('content')
    @if (!empty($product) && $product !== null)
        @include('client.page.product-detail.product-name')

        <section>
            <div class="container" style="flex-shrink: 0;">
                <div class="row p-4">
                    @include('client.page.product-detail.introduce')
                    @include('client.page.product-detail.buy')
                </div>
            </div>
        </section>

        @include('client.page.product-detail.buy-together')
    @endif
@endsection

@section('js')
@endsection