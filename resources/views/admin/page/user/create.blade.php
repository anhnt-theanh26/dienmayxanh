@extends('layout.admin')

@section('title', 'Them moi')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <script src="{{ asset('/administrator/assets/js/config.js') }}"></script>
@endsection

@include('ckfinder::setup')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User/</span> Create</h4>
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
                    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" placeholder="Name" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" placeholder="Email" />
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-password-toggle">
                                            <label class="form-label" for="basic-default-password12">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                    id="basic-default-password12" value="{{ old('password') }}"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="basic-default-password2" />
                                                <span id="basic-default-password2"
                                                    class="input-group-text cursor-pointer"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone" />
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address') }}" placeholder="Address" />
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="flatpickr-datetime" class="form-label">Birthday</label>
                                        <input type="text" class="form-control flatpickr-input" name="birthday"
                                            placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime" readonly="readonly"
                                            value="{{ old('birthday') }}">
                                        @error('birthday')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Image</label><br>
                                        <input type="hidden" id="image" class="form-control" name="image">
                                        <div class="input-group"
                                            style="position: relative; display: inline-block; width: 100px;">
                                            <img id="img" class="btn-image rounded-1"
                                                src="{{ asset('./storage/default.jpg') }}" width="100px"
                                                alt="Image">
                                            <button type="button" class="btn btn-light btn-image" id="choose-button"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2;
                                                         background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                Choose
                                            </button>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}"
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
    {{-- ckfinder --}}
    <script type="text/javascript" src="{{ asset('/js/ckfinder/ckfinder.js') }}"></script>
    <script>
        CKFinder.config({
            connectorPath: '/ckfinder/connector'
        });
    </script>
    <script>
        var btnimagecategory = document.querySelectorAll('.btn-image');

        for (var i = 0; i < btnimagecategory.length; i++) {
            btnimagecategory[i].onclick = function() {
                imageChoseClick('image');
            };
        }

        function imageChoseClick(elementId) {
            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    var img = document.querySelector('#img');
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var output = document.getElementById(elementId);
                        output.value = file.getUrl();
                        img.src = output.value;
                    });

                    finder.on('file:choose:resizedImage', function(evt) {
                        var output = document.getElementById(elementId);
                        output.value = evt.data.resizedUrl;
                        img.src = output.value;
                    });
                }
            });
        }
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
