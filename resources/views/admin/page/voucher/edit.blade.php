@extends('layout.admin')

@section('title', 'Cap nhap')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Voucher /</span> Update</h4>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <h5 class="card-header">Update</h5>
                <div class="card-body">
                    <form action="{{ route('admin.voucher.update', ['id' => $voucher->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    <label class="form-label" for="promo_code">Code</label>
                                    <input type="text" class="form-control" id="promo_code" name="promo_code"
                                        value="{{ $voucher->promo_code }}" placeholder="Mã khuyến mãi" required />
                                    @error('promo_code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="discount_percentage">Percentage (%)</label>
                                    <input type="number" class="form-control" id="discount_percentage" min="1"
                                        max="100" name="discount_percentage"
                                        value="{{ $voucher->discount_percentage }}" placeholder="Phần trăm giảm giá"
                                        required />
                                    @error('discount_percentage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="bs-rangepicker-time" class="form-label">Scope</label>
                                    <input type="text" id="bs-rangepicker-time" class="form-control" name="time"
                                        value="{{ $voucher->time }}" readonly="readonly" required />
                                    @error('time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="switch switch-primary">
                                        <span class="switch-label">Status</span>
                                        <input type="checkbox" class="switch-input" name="status" value="1"
                                            @checked($voucher->status == '1')>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="max_discount">Max discount</label>
                                    <input type="number" min="1" class="form-control" id="max_discount"
                                        name="max_discount" value="{{ $voucher->max_discount }}" placeholder="Giảm tối đa"
                                        required />
                                    @error('max_discount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('admin.voucher.index') }}"
                                    class="text-muted float-end">Back</a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    <label class="form-label" for="max_use">Max use</label>
                                    <input type="number" min="0" class="form-control" id="max_use"
                                        name="max_use" value="{{ $voucher->max_use }}" placeholder="Tối đa lượt sử dụng"
                                        required />
                                    @error('max_use')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="discount_condition">Condition</label>
                                    <input type="number" class="form-control" id="discount_condition"
                                        name="discount_condition" value="{{ $voucher->discount_condition }}"
                                        placeholder="Nhập số tiền tối thiểu để có thể áp dụng" />
                                    @error('discount_condition')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    @php
                                        $productsSelected = null;
                                        if ($voucher->products != null) {
                                            $productsSelected = json_decode($voucher->products, true);
                                            if (json_last_error() !== JSON_ERROR_NONE) {
                                                $productsSelected = null;
                                            }
                                        }
                                    @endphp
                                    <label for="select2Primary" class="form-label">Product</label>
                                    <div class="select2-primary">
                                        <select id="select2Primary" class="select2 form-select" name="products[]"
                                            multiple>
                                            <optgroup label="Product">
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ collect($productsSelected)->contains($item->id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('products*.*')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div id="defaultFormControlHelp" class="form-text">
                                            Giữ <strong>Ctrl</strong> (Windows) hoặc <strong>⌘ Command</strong> (Mac) để
                                            chọn nhiều sản phẩm. <br>
                                            Không chọn gì nếu bạn muốn áp dụng voucher cho tất cả sản phẩm.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @php
                                        $usersSelected = null;
                                        if ($voucher->users != null) {
                                            $usersSelected = json_decode($voucher->users, true);
                                            if (json_last_error() !== JSON_ERROR_NONE) {
                                                $usersSelected = null;
                                            }
                                        }
                                    @endphp
                                    <label for="select2Multiple" class="form-label">User</label>
                                    <select id="select2Multiple" class="select2 form-select" name="users[]" multiple>
                                        <optgroup label="User">
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ collect($usersSelected)->contains($item->id) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('users*.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Giữ <strong>Ctrl</strong> (Windows) hoặc <strong>⌘ Command</strong> (Mac) để
                                        chọn nhiều người dùng. <br>
                                        Không chọn gì nếu bạn muốn áp dụng voucher cho tất cả người dùng.
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" class="" style="display: none" placeholder="YYYY-MM-DD to YYYY-MM-DD"
        id="flatpickr-range" />
@endsection

@section('js')
    <script src="{{ asset('/administrator/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-pickers.js') }}"></script>

    <script src="{{ asset('/administrator/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-tagify.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-typeahead.js') }}"></script>
@endsection
