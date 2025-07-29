@extends('layout.admin')

@section('title', 'Chi tiết đơn hàng')

@section('css')
    @include('admin.elements.css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                            fill="#7367F0" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                            fill="#161616" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                            fill="#161616" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                            fill="#7367F0" />
                                    </svg>

                                    <span class="app-brand-text fw-bold fs-4"> Vuexy </span>
                                </div>
                                <p class="mb-2">Name: {{ $bill->recipient_name }}</p>
                                <p class="mb-2">Address: {{ $bill->shipping_address }} </p>
                                <p class="mb-0">Phone: {{ $bill->phone }}</p>
                            </div>
                            <div>
                                <h4 class="fw-semibold mb-2">CODE {{ $bill->code }}</h4>
                                <div class="mb-2 pt-1">
                                    <span>Order Date:</span>
                                    <span
                                        class="fw-semibold">{{ \Carbon\Carbon::parse($bill->order_date)->format('d/m/Y') }}</span>
                                </div>
                                <div class="mb-2 pt-1">
                                    <span>Payment Method:</span>
                                    @if ($bill->payment_method == 'online')
                                        <span class="fw-semibold badge bg-label-success">{{ $bill->payment_method }}</span>
                                    @endif
                                    @if ($bill->payment_method == 'offline')
                                        <span class="fw-semibold badge bg-label-danger">{{ $bill->payment_method }}</span>
                                    @endif
                                </div>
                                <div class="mb-2 pt-1">
                                    <span>Payment Status:</span>
                                    @if ($bill->payment_status == 'Paid')
                                        <span class="fw-semibold badge bg-label-success">Đã thanh toán</span>
                                    @elseif ($bill->payment_status == 'Payment Failed')
                                        <span class="fw-semibold badge bg-label-danger">Thanh toán thất bại</span>
                                    @elseif ($bill->payment_status == 'Unpaid')
                                        <span class="fw-semibold badge bg-label-primary">Chưa thanh toán</span>
                                    @endif
                                </div>
                                <div class="mb-2 pt-1">
                                    <span>Order Status:</span>
                                    <span class="fw-semibold">{{ $bill->status }}</span>
                                </div>
                                @if ($bill->reason_cancel)
                                    <div class="mb-2 pt-1">
                                        <span>Reason Cancel:</span>
                                        <span class="fw-semibold">{{ $bill->reason_cancel }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="mb-3">Hóa đơn công ty:</h6>
                                <p class="mb-1">Tên công ty</p>
                                <p class="mb-1">Địa chỉ công ty</p>
                                <p class="mb-1">Mã số thuế</p>
                                <p class="mb-0">peakyFBlinders@gmail.com</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="mb-4">Hóa đơn:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-4">Total:</td>
                                            <td><strong>{{ number_format($bill->total_amount, 0, '.', '.') }} VNĐ</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Payment method:</td>
                                            <td>{{ $bill->payment_method }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Transaction:</td>
                                            <td>{{ $bill->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Code:</td>
                                            <td>{{ $bill->code }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive border-top">
                        <table class="table m-0 table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Variant</th>
                                    <th>Cost</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bill->billItems as $item)
                                    <tr>
                                        <td class="text-nowrap" style="width: 30%">{{ $item->name }}</td>
                                        <td class="text-nowrap">{{ $item->variant }}</td>
                                        <td>{{ number_format($item->price, 0, '.', '.') }} VNĐ</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total_price, 0, '.', '.') }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="align-top px-4 py-4">
                                    </td>
                                    <td class="text-end pe-3 py-4">
                                        @if ($bill->discount > 0)
                                            <p class="mb-2">Discount:</p>
                                        @endif
                                        <p class="mb-0 pb-3">Total:</p>
                                    </td>
                                    <td class="ps-2 py-4">
                                        @if ($bill->discount > 0)
                                            <p class="fw-semibold mb-2">
                                                {{ number_format($bill->disscount, 0, '.', '.') ?? 0 }} VNĐ
                                            </p>
                                        @endif
                                        <p class="fw-semibold mb-0 pb-3">
                                            {{ number_format($bill->total_amount, 0, '.', '.') }} VNĐ
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body mx-3">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-semibold">Note:</span>
                                <span>{{ $bill->note ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

        </div>

    </div>


@endsection

@section('js')
    @include('admin.elements.js')
@endsection
