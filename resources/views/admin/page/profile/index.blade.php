@extends('layout.admin')

@section('title', 'Account Setting')

@section('css')
    @include('admin.elements.css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Show</h4>
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

    </div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i> Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile.security', ['id'=>1]) }}"><i class="ti-xs ti ti-lock me-1"></i>
                        Security</a>
                </li>
            </ul>
            <form action="{{ route('admin.profile.update') }}" method="POST" onsubmit="return true"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('./storage/default.jpg') }}"
                                alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload" class="account-file-input" hidden
                                        accept="image/jpeg, image/png, image/jpg, image/gif" />
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <div class="text-muted">Allowed jpeg, png, jpg or gif. Max size of 2048</div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ Auth::user()->name }}" autofocus />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="Email" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">+84</span>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ Auth::user()->phone }}" placeholder="0123456789" />
                                </div>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ Auth::user()->address }}" placeholder="Address" />
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="flatpickr-datetime" class="form-label">Birthday</label>
                                <input type="text" class="form-control flatpickr-input" name="birthday"
                                    placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime" readonly="readonly"
                                    value="{{ Auth::user()->birthday }}">
                                @error('birthday')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.profile.delete') }}" id="formAccountDeactivation" method="post"
                        onsubmit="return true">
                        @csrf
                        @method('delete')
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-pickers.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/pages-account-settings-account.js') }}"></script>

@endsection
