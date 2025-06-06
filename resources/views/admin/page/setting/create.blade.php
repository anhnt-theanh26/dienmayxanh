@extends('layout.admin')

@section('title', 'Them moi')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting/</span> Create</h4>
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Setting</h5>
                <form action="{{ route('admin.setting.store') }}" method="post">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-md-6 mb-4">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="logo">Logo</label>
                                            <input id="thumbnail" class="form-control" type="hidden" name="logo">
                                            <div class="d-flex align-items-center">
                                                <div class="input-group"
                                                    style="position: relative; display: inline-block; width: 80px;">
                                                    <img id="img" class="btn-image rounded-1"
                                                        src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                        alt="logo">
                                                    <button id="lfm" data-input="thumbnail" data-preview="holder"
                                                        type="button" class="btn btn-light btn-image rounded-1"
                                                        id="choose-button"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                        Choose
                                                    </button>
                                                </div>
                                                <div id="holder" class="mx-2" style="width: 100%"></div>
                                            </div>
                                            @error('logo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div id="support-container">
                                                <div class="row support-row">
                                                    <div class="mb-3 col-lg-3 col-12">
                                                        <label class="form-label" for="support[0][method]">Method</label>
                                                        <textarea name="support[0][method]" placeholder="Method" id="support[0][method]" class="form-control" rows="1"></textarea>
                                                        @error('support.*.method')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-lg-3 col-12">
                                                        <label class="form-label" for="support[0][phone]">Phone</label>
                                                        <textarea name="support[0][phone]" placeholder="Phone" id="support[0][phone]" class="form-control" rows="1"></textarea>
                                                        @error('support.*.phone')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-lg-3 col-12">
                                                        <label class="form-label" for="support[0][time]">Time</label>
                                                        <textarea name="support[0][time]" placeholder="Time" id="support[0][time]" class="form-control" rows="1"></textarea>
                                                        @error('support.*.time')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-lg-3 col-12">
                                                        <div class="d-flex justify-content-between m-0 p-0">
                                                            <label class="form-label" for="support[0][href]">Href</label>
                                                            <i class="ti ti-x ti-xs me-1 btn-delete-support"></i>
                                                        </div>
                                                        <textarea name="support[0][href]" placeholder="Href" id="support[0][href]" class="form-control" rows="1"></textarea>
                                                        @error('support.*.href')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="mb-0">
                                                <button class="btn btn-outline-primary text-center" id="add-support"
                                                    type="button">
                                                    <i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="color">Color Main</label><br>
                                            <div class="btn-group py-2" role="group" style="width: 100%;"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check btn-color" id="btn-color2"
                                                    checked="" value="choose">
                                                <label class="btn btn-outline-primary waves-effect" for="btn-color2">
                                                    Chọn
                                                </label>
                                                <input type="radio" class="btn-check btn-color" id="btn-color1"
                                                    value="enter">
                                                <label class="btn btn-outline-primary waves-effect" for="btn-color1">
                                                    Nhập
                                                </label>
                                            </div>
                                            <div class="show-color">
                                                <input class="form-control" type="color" value="" name="color"
                                                    id="html5-color-input color">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="greetingAndInstruct">
                                                Lời chào, hướng dẫn đăng nhập - Admin
                                            </label>
                                            <div class="col-12">
                                                <label class="form-label" for="greeting">Lời chào</label>
                                                <textarea name="greeting" placeholder="Chào mừng đến với..." id="greeting" class="form-control" rows="1"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="instruct">Hướng dẫn</label>
                                                <textarea name="instruct" placeholder="Vui lòng đăng nhập..." id="instruct" class="form-control" rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="layout-not-found">Giao diện không tìm thấy
                                                trang chủ</label>
                                            <textarea name="layout-not-found" placeholder="Not Fount" id="layout-not-found" class="form-control"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="seo">Seo</label>
                                            <div class="col-12">
                                                <label class="form-label" for="title">Seo Title</label>
                                                <textarea name="title" placeholder="Title" id="title" class="form-control" rows="1"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="description">Seo Description</label>
                                                <textarea name="description" placeholder="description" id="description" class="form-control" rows="1"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="seoimage">Seo Image</label>
                                                <input id="thumbnail" class="form-control" type="hidden"
                                                    name="seoimage">
                                                <div class="d-flex align-items-center">
                                                    <div class="input-group"
                                                        style="position: relative; display: inline-block; width: 80px;">
                                                        <img id="img" class="btn-image rounded-1"
                                                            src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                            alt="seoimage">
                                                        <button id="lfm_2" data-input="thumbnail"
                                                            data-preview="holder" type="button"
                                                            class="btn btn-light btn-image rounded-1" id="choose-button"
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                            Choose
                                                        </button>
                                                    </div>
                                                    <div id="holder" class="mx-2" style="width: 100%"></div>
                                                </div>
                                                @error('seoimage')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="TagifyBasic" class="form-label">Seo Keyword</label>
                                                <input id="TagifyBasic" class="form-control" name="keyword"
                                                    placeholder="Keyword" value="" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="seo">Seo</label>
                                            <div class="col-12">
                                                <label class="form-label" for="title">Seo Title</label>
                                                <textarea name="title" placeholder="Title" id="title" class="form-control" rows="1"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="description">Seo Description</label>
                                                <textarea name="description" placeholder="description" id="description" class="form-control" rows="1"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="seoimage">Seo Image</label>
                                                <input id="thumbnail" class="form-control" type="hidden"
                                                    name="seoimage">
                                                <div class="d-flex align-items-center">
                                                    <div class="input-group"
                                                        style="position: relative; display: inline-block; width: 80px;">
                                                        <img id="img" class="btn-image rounded-1"
                                                            src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                            alt="seoimage">
                                                        <button id="lfm_2" data-input="thumbnail"
                                                            data-preview="holder" type="button"
                                                            class="btn btn-light btn-image rounded-1" id="choose-button"
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                            Choose
                                                        </button>
                                                    </div>
                                                    <div id="holder" class="mx-2" style="width: 100%"></div>
                                                </div>
                                                @error('seoimage')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="TagifyBasic" class="form-label">Seo Keyword</label>
                                                <input id="TagifyBasic" class="form-control" name="keyword"
                                                    placeholder="Keyword" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{ route('admin.setting.index') }}"
                                class="text-muted float-end">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Default</h5>
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                                aria-describedby="defaultFormControlHelp">
                            <div id="defaultFormControlHelp" class="form-text">
                                We'll never share your details with anyone else.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Float label</h5>
                    <div class="card-body">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                                aria-describedby="floatingInputHelp">
                            <label for="floatingInput">Name</label>
                            <div id="floatingInputHelp" class="form-text">
                                We'll never share your details with anyone else.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Float label</h5>
                    <div class="card-body">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                                aria-describedby="floatingInputHelp">
                            <label for="floatingInput">Name</label>
                            <div id="floatingInputHelp" class="form-text">
                                We'll never share your details with anyone else.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="demo-inline-spacing">
                <button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>
                <button type="button" class="btn btn-secondary waves-effect waves-light">Secondary</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfm_2').filemanager('image');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let supportIndex = 1;

        function attachDeleteEvents() {
            document.querySelectorAll('.btn-delete-support').forEach(button => {
                button.onclick = function() {
                    const allRows = document.querySelectorAll('.support-row');
                    if (allRows.length <= 1) {
                        Swal.fire('Oops!', 'At least one support is required.', 'warning');
                        return;
                    }

                    Swal.fire({
                        title: 'Delete this support?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('.support-row').remove();
                        }
                    });
                };
            });
        }

        document.getElementById('add-support').addEventListener('click', function() {
            const container = document.getElementById('support-container');
            const firstRow = container.querySelector('.support-row');
            const newRow = firstRow.cloneNode(true);

            // Reset input values & update name attributes
            newRow.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                const newName = name.replace(/\[\d+\]/, `[${supportIndex}]`);
                input.setAttribute('name', newName);
                if (input.tagName === 'INPUT') input.value = '';
                if (input.tagName === 'SELECT') input.selectedIndex = 0;
            });

            container.appendChild(newRow);
            supportIndex++;
            attachDeleteEvents();
        });

        attachDeleteEvents();
    </script>
    <script>
        document.querySelectorAll('.btn-color').forEach(btn => {
            btn.addEventListener('change', function() {
                if (btn.value == 'choose') {
                    $('.show-color').empty().html(
                        `<input class="form-control" type="color" value="" name="main-color" id="html5-color-input color">`
                    );
                    console.log('choose');
                } else if (btn.value == 'enter') {
                    $('.show-color').empty().html(
                        `<input class="form-control" type="text" value="" name="main-color" id="html5-color-input color" placeholder="Mã Màu (VD: #FFFFFF)" required>`
                    );
                    console.log('enter');
                }
            });
        });
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-tagify.js') }}"></script>

@endsection
