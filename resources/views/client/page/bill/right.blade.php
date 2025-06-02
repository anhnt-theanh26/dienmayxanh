@extends('client.page.profile.index')
@section('title', 'Đơn hàng của tôi')

@section('css')
@endsection

@section('content-profile-bill')
    <div class="col-9">
        @include('client.page.bill.top')
        @include('client.page.bill.content')
    </div>
@endsection

@section('js')
@endsection
