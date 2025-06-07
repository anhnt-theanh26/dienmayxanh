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
    <form action="{{ route('admin.setting.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <h5 class="card-header">Name</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name"
                                placeholder="Tên cài đặt...">
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Logo</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="logo">Logo</label>
                            <input id="thumbnail" class="form-control" type="hidden" name="logo">
                            <div class="d-flex align-items-center">
                                <div class="input-group" style="position: relative; display: inline-block; width: 80px;">
                                    <img id="img" class="btn-image rounded-1"
                                        src="{{ asset('./storage/default.jpg') }}" width="80px" alt="logo">
                                    <button id="lfm" data-input="thumbnail" data-preview="holder" type="button"
                                        class="btn btn-light btn-image rounded-1" id="choose-button"
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
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Support</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <div id="support-container">
                                <div class="row support-row">
                                    <div class="mb-3 col-lg-6 col-12">
                                        <label class="form-label" for="support[0][method]">Method</label>
                                        <textarea name="support[0][method]" placeholder="Method Support" id="support[0][method]" class="form-control"
                                            rows="1"></textarea>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-12">
                                        <div class="d-flex justify-content-between m-0 p-0">
                                            <label class="form-label" for="support[0][phone]">Phone</label>
                                            <i class="ti ti-x ti-xs me-1 btn-delete-support"></i>
                                        </div>
                                        <textarea name="support[0][phone]" placeholder="Phone Support" id="support[0][phone]" class="form-control"
                                            rows="1"></textarea>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-12">
                                        <label class="form-label" for="support[0][time]">Time</label>
                                        <textarea name="support[0][time]" placeholder="Time Support" id="support[0][time]" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-12">
                                        <label class="form-label" for="support[0][href]">Href</label>
                                        <textarea name="support[0][href]" placeholder="Href Support" id="support[0][href]" class="form-control" rows="1"></textarea>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-outline-primary text-center" id="add-support" type="button">
                                    <i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Main Color</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="color">Color Main</label><br>
                            <div class="btn-group py-2" role="group" style="width: 100%;"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check btn-color" id="btn-color2" value="choose"
                                    name="" checked>
                                <label class="btn btn-outline-primary waves-effect" for="btn-color2">Chọn</label>

                                <input type="radio" class="btn-check btn-color" id="btn-color1" value="enter"
                                    name="">
                                <label class="btn btn-outline-primary waves-effect" for="btn-color1">Nhập</label>
                            </div>

                            <div class="show-color mt-3">
                                <input class="form-control" type="color" value="" name="main_color"
                                    id="color-picker">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Greeting And Instruct</h5>
                    <div class="card-body">
                        <label class="form-label" for="greetingAndInstruct">
                            Lời chào, hướng dẫn đăng nhập - Admin
                        </label>
                        <div class="mb-3">
                            <div class="col-12">
                                <label class="form-label" for="greeting">Lời chào</label>
                                <textarea name="greeting" placeholder="Chào mừng đến với..." id="greeting" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-12">
                                <label class="form-label" for="instruct">Hướng dẫn</label>
                                <textarea name="instruct" placeholder="Vui lòng đăng nhập..." id="instruct" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4">
                    <h5 class="card-header">Seo Products</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Products</label>
                            <div class="col-12">
                                <label class="form-label" for="seo_title_products">Seo Title</label>
                                <textarea name="title_products" placeholder="Title" id="seo_title_products" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="seo_description_products">Seo Description</label>
                                <textarea name="description_products" placeholder="Description" id="seo_description_products" class="form-control"
                                    rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="seo_image_products">Seo Image</label>
                                <input id="thumbnail_products" class="form-control" type="hidden"
                                    name="seoimage_products">
                                <div class="d-flex align-items-center">
                                    <div class="input-group"
                                        style="position: relative; display: inline-block; width: 80px;">
                                        <img id="img_products" class="btn-image rounded-1"
                                            src="{{ asset('./storage/default.jpg') }}" width="80px" alt="seoimage">
                                        <button id="lfm_products" data-input="thumbnail_products"
                                            data-preview="holder_products" type="button"
                                            class="btn btn-light btn-image rounded-1"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                            Choose
                                        </button>
                                    </div>
                                    <div id="holder_products" class="mx-2" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="TagifyBasic" class="form-label">Seo Robots</label>
                                <input id="TagifyBasic" class="form-control" name="robots_products"
                                    placeholder="Seo Robots" value="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Seo Posts</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Posts</label>
                            <div class="col-12">
                                <label class="form-label" for="seo_title_posts">Seo Title</label>
                                <textarea name="title_posts" placeholder="Title" id="seo_title_posts" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="seo_description_posts">Seo Description</label>
                                <textarea name="description_posts" placeholder="Description" id="seo_description_posts" class="form-control"
                                    rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="seo_image_posts">Seo Image</label>
                                <input id="thumbnail_posts" class="form-control" type="hidden" name="seoimage_posts">
                                <div class="d-flex align-items-center">
                                    <div class="input-group"
                                        style="position: relative; display: inline-block; width: 80px;">
                                        <img id="img_posts" class="btn-image rounded-1"
                                            src="{{ asset('./storage/default.jpg') }}" width="80px" alt="seoimage">
                                        <button id="lfm_posts" data-input="thumbnail_posts" data-preview="holder_posts"
                                            type="button" class="btn btn-light btn-image rounded-1"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                            Choose
                                        </button>
                                    </div>
                                    <div id="holder_posts" class="mx-2" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="TagifyReadonly" class="form-label">Seo Robots</label>
                                <input id="TagifyReadonly" class="form-control" name="robots_posts"
                                    placeholder="Seo Robots" value="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Layout Not Found</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="layout">
                                Giao diện trang không tìm thấy
                            </label>
                            <div class="col-12">
                                <label class="form-label" for="layout">Layout</label>
                                <textarea name="layout"
                                    placeholder='<h1>Xin lỗi, chúng tôi không tìm thấy trang mà bạn cần!<h1><img src="https://not-found.png" alt="">...'
                                    id="layout" class="form-control" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="{{ route('admin.setting.index') }}" class="text-muted float-end">Back</a>
    </form>
@endsection

@section('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfm_products').filemanager('image');
        $('#lfm_posts').filemanager('image');
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

            newRow.querySelectorAll('textarea').forEach(textarea => {
                const oldName = textarea.getAttribute('name');
                const newName = oldName.replace(/\[\d+\]/, `[${supportIndex}]`);
                textarea.setAttribute('name', newName);
                textarea.setAttribute('id', newName);
                textarea.value = '';

                // Cập nhật label tương ứng
                const label = newRow.querySelector(`label[for="${oldName}"]`);
                if (label) {
                    label.setAttribute('for', newName);
                }
            });

            container.appendChild(newRow);
            supportIndex++;
            attachDeleteEvents();
        });

        attachDeleteEvents();
    </script>

    <script>
        document.querySelectorAll('.btn-color').forEach(btn => {
            btn.addEventListener('click', function() {
                const showColorDiv = document.querySelector('.show-color');
                if (btn.value === 'choose') {
                    showColorDiv.innerHTML =
                        `<input class="form-control" type="color" value="#000000" name="main-color" id="color-picker">`;
                } else if (btn.value === 'enter') {
                    showColorDiv.innerHTML =
                        `<input class="form-control" type="text" value="" name="main-color" id="color-input" placeholder="Mã Màu (VD: #FFFFFF)">`;
                }
            });
        });
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-tagify.js') }}"></script>

@endsection
