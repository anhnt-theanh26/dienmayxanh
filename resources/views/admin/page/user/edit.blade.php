@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/pickr/pickr-themes.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User/</span> Update</h4>
    <div class="card-body">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" placeholder="Name" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" placeholder="Email" />
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}" placeholder="Phone" />
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $user->address }}" placeholder="Address" />
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="flatpickr-datetime" class="form-label">Birthday</label>
                                        <input type="text" class="form-control flatpickr-input" name="birthday"
                                            placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime" readonly="readonly"
                                            value="{{ $user->birthday }}">
                                        @error('birthday')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Image</label><br>
                                        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $user->image }}">
                                        <div class="d-flex align-items-center">
                                            <div class="input-group"
                                                style="position: relative; display: inline-block; width: 80px;">
                                                <img id="img" class="btn-image rounded-1"
                                                    src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                    alt="Image">
                                                <button id="lfm" data-input="thumbnail" data-preview="holder"
                                                    type="button" class="btn btn-light btn-image rounded-1"
                                                    id="choose-button"
                                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                    Choose
                                                </button>
                                            </div>
                                            <div id="holder" class="mx-2" style="width: 100%">
                                                <img class="btn-image rounded-1 object-fit-contain" src="{{ asset($user->image) }}"
                                                    height="80px" alt="Image">
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}"
                                        class="text-muted float-end">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <form action="{{ route('admin.user.password', ['id' => $user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Old Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12"
                                        value="{{ old('old_password') }}"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" name="old_password" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                                @error('old_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if (session('password_is_incorrect'))
                                    <p class="text-danger">{{ session('password_is_incorrect') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12"
                                        value="{{ old('new_password') }}"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" name="new_password" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                                @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if (session('oldpassword_like_newpassword'))
                                    <p class="text-danger">{{ session('oldpassword_like_newpassword') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control"
                                        id="basic-default-password12"value="{{ old('confirm_password') }}"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" name="confirm_password" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                                @error('confirm_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <!-- publish at -->
    <script src="{{ asset('/administrator/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-pickers.js') }}"></script>

@endsection
