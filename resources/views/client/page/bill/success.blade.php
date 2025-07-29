@extends('layout.client')

@section('title', 'Thất bại')

@section('content')
    <h1>Thanh toán thành công!</h1>
    <p>Mã đơn hàng: {{ $order->code }}</p>
    <p>Tổng tiền: {{ number_format($order->total_amount) }} VND</p>
@endsection
