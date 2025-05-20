@extends('layout.admin')

@section('title', 'Them moi')

@section('css')

    <script src="{{ asset('/administrator/assets/js/config.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Voucher /</span> Create</h4>
    <div class="card-body">
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create</h5>
                    <small class="text-muted float-end">Create</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.voucher.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Code</label>
                                        <input type="text" class="form-control" id="promo_code" name="promo_code"
                                            value="{{ old('promo_code') }}" placeholder="Mã khuyến mãi" />
                                        @error('promo_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Percentage (%)</label>
                                        <input type="text" class="form-control" id="discount_percentage"
                                            name="discount_percentage" value="{{ old('discount_percentage') }}"
                                            placeholder="Phần trăm giảm giá" />
                                        @error('discount_percentage')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name">start_date</label>
                                        <input type="text" class="form-control" id="start_date"
                                            name="start_date" value="{{ old('start_date') }}"
                                            placeholder="Phần trăm giảm giá" />
                                        @error('start_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    end_date
                                    status
                                    max_discount
                                    max_use
                                    discount_condition
                                    users
                                    products
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.voucher.index') }}"
                                        class="text-muted float-end">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
