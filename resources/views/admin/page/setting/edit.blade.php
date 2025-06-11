@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting/</span> Update</h4>
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
    <form action="{{ route('admin.setting.update', ['id' => $setting->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <h5 class="card-header">Name</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name"
                                placeholder="Tên cài đặt..." value="{{ $setting->name }}">
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Logo</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="logo">Logo</label>
                            <input id="thumbnail" class="form-control" type="hidden" name="logo"
                                value="{{ $setting->logo }}">
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
                                <div id="holder" class="mx-2" style="width: 100%">
                                    <img class="btn-image rounded-1 object-fit-contain"
                                        src="{{ asset($setting->logo) }}"width="80px" alt="Image">
                                </div>
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
                                @php
                                    $supportArr = null;
                                    if ($setting?->support) {
                                        $supportArr = json_decode($setting?->support, true);
                                        if (json_last_error() !== JSON_ERROR_NONE) {
                                            $supportArr = null;
                                        }
                                    }
                                @endphp
                                @if ($supportArr)
                                    <div class="row support-row">
                                        @if ($supportArr)
                                            @foreach ($supportArr as $supportTtem)
                                                <div class="mb-3 col-lg-6 col-12">
                                                    <label class="form-label"
                                                        for="support[{{ $supportTtem['id'] }}][method]">Method</label>
                                                    <textarea name="support[{{ $supportTtem['id'] }}][method]" placeholder="Method Support"
                                                        id="support[{{ $supportTtem['id'] }}][method]" class="form-control" rows="1">{{ $supportTtem['method'] }}</textarea>
                                                </div>
                                                <div class="mb-3 col-lg-6 col-12">
                                                    <div class="d-flex justify-content-between m-0 p-0">
                                                        <label class="form-label"
                                                            for="support[{{ $supportTtem['id'] }}][phone]">Phone</label>
                                                        <i class="ti ti-x ti-xs me-1 btn-delete-support"></i>
                                                    </div>
                                                    <textarea name="support[{{ $supportTtem['id'] }}][phone]" placeholder="Phone Support"
                                                        id="support[{{ $supportTtem['id'] }}][phone]" class="form-control" rows="1">{{ $supportTtem['phone'] }}</textarea>
                                                </div>
                                                <div class="mb-3 col-lg-6 col-12">
                                                    <label class="form-label"
                                                        for="support[{{ $supportTtem['id'] }}][time]">Time</label>
                                                    <textarea name="support[{{ $supportTtem['id'] }}][time]" placeholder="Time Support"
                                                        id="support[{{ $supportTtem['id'] }}][time]" class="form-control" rows="1">{{ $supportTtem['time'] }}</textarea>
                                                </div>
                                                <div class="mb-3 col-lg-6 col-12">
                                                    <label class="form-label"
                                                        for="support[{{ $supportTtem['id'] }}][href]">Href</label>
                                                    <textarea name="support[{{ $supportTtem['id'] }}][href]" placeholder="Href Support"
                                                        id="support[{{ $supportTtem['id'] }}][href]" class="form-control" rows="1">{{ $supportTtem['href'] }}</textarea>
                                                </div>
                                                <hr>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                                <template id="support-template">
                                    <div class="row support-row">
                                        <div class="mb-3 col-lg-6 col-12">
                                            <label class="form-label" for="support[__index__][method]">Method</label>
                                            <textarea name="support[__index__][method]" placeholder="Method Support" id="support[__index__][method]"
                                                class="form-control" rows="1"></textarea>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-12">
                                            <div class="d-flex justify-content-between m-0 p-0">
                                                <label class="form-label" for="support[__index__][phone]">Phone</label>
                                                <i class="ti ti-x ti-xs me-1 btn-delete-support"></i>
                                            </div>
                                            <textarea name="support[__index__][phone]" placeholder="Phone Support" id="support[__index__][phone]"
                                                class="form-control" rows="1"></textarea>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-12">
                                            <label class="form-label" for="support[__index__][time]">Time</label>
                                            <textarea name="support[__index__][time]" placeholder="Time Support" id="support[__index__][time]"
                                                class="form-control" rows="1"></textarea>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-12">
                                            <label class="form-label" for="support[__index__][href]">Href</label>
                                            <textarea name="support[__index__][href]" placeholder="Href Support" id="support[__index__][href]"
                                                class="form-control" rows="1"></textarea>
                                        </div>
                                        <hr>
                                    </div>
                                </template>
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
                                <input type="radio" class="btn-check btn-color-main" id="btn-color2" value="choose"
                                    name="color-option" checked>
                                <label class="btn btn-outline-primary waves-effect" for="btn-color2">Chọn</label>

                                <input type="radio" class="btn-check btn-color-main" id="btn-color1" value="enter"
                                    name="color-option">
                                <label class="btn btn-outline-primary waves-effect" for="btn-color1">Nhập</label>
                            </div>

                            <div class="show-color-main mt-3">
                                <input class="form-control" type="color" value="{{ $setting->main_color }}"
                                    name="main_color" id="color-picker">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Secondary Color</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="color-secondary">Color Secondary</label><br>
                            <div class="btn-group py-2" role="group" style="width: 100%;"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check btn-color-secondary" id="btn-color-secondary-1"
                                    value="choose" name="color-option" checked>
                                <label class="btn btn-outline-primary waves-effect"
                                    for="btn-color-secondary-1">Chọn</label>

                                <input type="radio" class="btn-check btn-color-secondary" id="btn-color-secondary-2"
                                    value="enter" name="color-option">
                                <label class="btn btn-outline-primary waves-effect"
                                    for="btn-color-secondary-2">Nhập</label>
                            </div>

                            <div class="show-color-secondary mt-3">
                                <input class="form-control" type="color" value="{{ $setting->secondary_color }}" name="secondary_color"
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
                        @php
                            $settingLoginAdmin = null;
                            if ($setting?->title_login_admin) {
                                $settingLoginAdmin = json_decode($setting->title_login_admin, true);
                                if (json_last_error() !== JSON_ERROR_NONE) {
                                    $settingLoginAdmin = null;
                                }
                            }
                        @endphp
                        @if ($settingLoginAdmin)
                            <div class="mb-3">
                                <div class="col-12">
                                    <label class="form-label" for="greeting">Lời chào</label>
                                    <textarea name="greeting" placeholder="Chào mừng đến với..." id="greeting" class="form-control" rows="1">{{ $settingLoginAdmin['greeting'] }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-12">
                                    <label class="form-label" for="instruct">Hướng dẫn</label>
                                    <textarea name="instruct" placeholder="Vui lòng đăng nhập..." id="instruct" class="form-control" rows="1">{{ $settingLoginAdmin['instruct'] }}</textarea>
                                </div>
                            </div>
                        @else
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
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4">
                    <h5 class="card-header">Seo Products</h5>
                    <div class="card-body">
                        @php
                            $seoProduct = null;
                            if ($setting?->seo_products) {
                                $seoProduct = json_decode($setting->seo_products, true);
                                if (json_last_error() !== JSON_ERROR_NONE) {
                                    $seoProduct = null;
                                }
                            }
                        @endphp
                        @if ($seoProduct)
                            <div class="mb-3">
                                <label class="form-label">Products</label>
                                <div class="col-12">
                                    <label class="form-label" for="seo_title_products">Seo Title</label>
                                    <textarea name="title_products" placeholder="Title" id="seo_title_products" class="form-control" rows="1">{{ $seoProduct['title_products'] }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="seo_description_products">Seo Description</label>
                                    <textarea name="description_products" placeholder="Description" id="seo_description_products" class="form-control"
                                        rows="3">{{ $seoProduct['description_products'] }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="seo_image_products">Seo Image</label>
                                    <input id="thumbnail_products" class="form-control" type="hidden"
                                        name="seoimage_products" value="{{ $seoProduct['seoimage_products'] }}">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group"
                                            style="position: relative; display: inline-block; width: 80px;">
                                            <img id="img_products" class="btn-image rounded-1"
                                                src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                alt="seoimage">
                                            <button id="lfm_products" data-input="thumbnail_products"
                                                data-preview="holder_products" type="button"
                                                class="btn btn-light btn-image rounded-1"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                Choose
                                            </button>
                                        </div>
                                        <div id="holder_products" class="mx-2" style="width: 100%">
                                            <img class="btn-image rounded-1 object-fit-contain"
                                                src="{{ asset($seoProduct['seoimage_products']) }}"width="80px"
                                                alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="robots_products" class="form-label">Seo Robots</label>
                                    <select id="robots_products" name="robots_products" class="selectpicker w-100"
                                        data-style="btn-default">
                                        <option value="index, follow"
                                            {{ $seoProduct['robots_products'] == 'index, follow' ? 'selected' : '' }}>
                                            index, follow</option>
                                        <option value="noindex, follow"
                                            {{ $seoProduct['robots_products'] == 'noindex, follow' ? 'selected' : '' }}>
                                            noindex, follow</option>
                                        <option value="index, nofollow"
                                            {{ $seoProduct['robots_products'] == 'index, nofollow' ? 'selected' : '' }}>
                                            index, nofollow</option>
                                        <option value="noindex, nofollow"
                                            {{ $seoProduct['robots_products'] == 'noindex, nofollow' ? 'selected' : '' }}>
                                            noindex, nofollow</option>
                                    </select>
                                </div>
                            </div>
                        @else
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
                                                src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                alt="seoimage">
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
                                    <label for="robots_products" class="form-label">Seo Robots</label>
                                    <select id="robots_products" name="robots_products" class="selectpicker w-100"
                                        data-style="btn-default">
                                        <option value="index, follow">index, follow</option>
                                        <option value="noindex, follow">noindex, follow</option>
                                        <option value="index, nofollow">index, nofollow</option>
                                        <option value="noindex, nofollow">noindex, nofollow</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Seo Posts</h5>
                    <div class="card-body">
                        @php
                            $seoPost = null;
                            if ($setting?->seo_posts) {
                                $seoPost = json_decode($setting->seo_posts, true);
                                if (json_last_error() !== JSON_ERROR_NONE) {
                                    $seoPost = null;
                                }
                            }
                        @endphp
                        @if ($seoPost)
                            <div class="mb-3">
                                <label class="form-label">Posts</label>
                                <div class="col-12">
                                    <label class="form-label" for="seo_title_posts">Seo Title</label>
                                    <textarea name="title_posts" placeholder="Title" id="seo_title_posts" class="form-control" rows="1">{{ $seoPost['title_posts'] }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="seo_description_posts">Seo Description</label>
                                    <textarea name="description_posts" placeholder="Description" id="seo_description_posts" class="form-control"
                                        rows="3">{{ $seoPost['description_posts'] }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="seo_image_posts">Seo Image</label>
                                    <input id="thumbnail_posts" class="form-control" type="hidden"
                                        name="seoimage_posts">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group"
                                            style="position: relative; display: inline-block; width: 80px;">
                                            <img id="img_posts" class="btn-image rounded-1"
                                                src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                alt="seoimage">
                                            <button id="lfm_posts" data-input="thumbnail_posts"
                                                data-preview="holder_posts" type="button"
                                                class="btn btn-light btn-image rounded-1"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                Choose
                                            </button>
                                        </div>
                                        <div id="holder_posts" class="mx-2" style="width: 100%">
                                            <img class="btn-image rounded-1 object-fit-contain"
                                                src="{{ asset($seoPost['seoimage_posts']) }}"width="80px" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="robots_posts" class="form-label">Seo Robots</label>
                                    <select id="robots_posts" name="robots_posts" class="selectpicker w-100"
                                        data-style="btn-default">
                                        <option value="index, follow"
                                            {{ $seoPost['robots_posts'] == 'index, follow' ? 'selected' : '' }}>
                                            index, follow</option>
                                        <option value="noindex, follow"
                                            {{ $seoPost['robots_posts'] == 'noindex, follow' ? 'selected' : '' }}>
                                            noindex, follow</option>
                                        <option value="index, nofollow"
                                            {{ $seoPost['robots_posts'] == 'index, nofollow' ? 'selected' : '' }}>
                                            index, nofollow</option>
                                        <option value="noindex, nofollow"
                                            {{ $seoPost['robots_posts'] == 'noindex, nofollow' ? 'selected' : '' }}>
                                            noindex, nofollow</option>
                                    </select>

                                </div>
                            </div>
                        @else
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
                                    <input id="thumbnail_posts" class="form-control" type="hidden"
                                        name="seoimage_posts">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group"
                                            style="position: relative; display: inline-block; width: 80px;">
                                            <img id="img_posts" class="btn-image rounded-1"
                                                src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                alt="seoimage">
                                            <button id="lfm_posts" data-input="thumbnail_posts"
                                                data-preview="holder_posts" type="button"
                                                class="btn btn-light btn-image rounded-1"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                Choose
                                            </button>
                                        </div>
                                        <div id="holder_posts" class="mx-2" style="width: 100%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="robots_posts" class="form-label">Seo Robots</label>
                                    <select id="robots_posts" name="robots_posts" class="selectpicker w-100"
                                        data-style="btn-default">
                                        <option value="index, follow">index, follow</option>
                                        <option value="noindex, follow">noindex, follow</option>
                                        <option value="index, nofollow">index, nofollow</option>
                                        <option value="noindex, nofollow">noindex, nofollow</option>
                                    </select>
                                </div>
                            </div>
                        @endif
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
                                    id="layout" class="form-control" rows="8">{{ $setting->layout_not_found }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
        <a class="btn btn-secondary" href="{{ route('admin.setting.index') }}" class="text-muted float-end">Back</a>
        <a class="btn btn-success" href="{{ route('admin.setting.create') }}" class="text-muted float-end">Create</a>
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
        let supportIndex = 1000;

        function attachDeleteEvents() {
            document.querySelectorAll('.btn-delete-support').forEach(button => {
                button.onclick = function() {
                    const supportRow = this.closest('.support-row');
                    const parentContainer = supportRow.parentElement;

                    // Nếu trong khối support mới (container mới), cho phép xóa hết
                    if (parentContainer.id === 'support-container') {
                        Swal.fire({
                            title: 'Xóa biến thể này?',
                            text: 'Hành động này không thể hoàn tác.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Xóa',
                            cancelButtonText: 'Hủy',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                supportRow.remove();
                            }
                        });
                    } else {
                        // Có thể bạn muốn xử lý xóa biến thể cũ ở đây, hoặc gửi ID để xóa khi submit form
                        Swal.fire('Không thể xóa trực tiếp biến thể đã lưu.', '', 'info');
                    }
                };
            });
        }

        document.getElementById('add-support').addEventListener('click', function() {
            const template = document.getElementById('support-template');
            const clone = template.content.cloneNode(true);

            // Thay __index__ thành chỉ số thật
            clone.querySelectorAll('textarea, label').forEach(el => {
                const name = el.getAttribute('name');
                if (name) {
                    el.setAttribute('name', name.replace('__index__', supportIndex));
                    el.setAttribute('id', name.replace('__index__', supportIndex));
                }
                if (el.hasAttribute('for')) {
                    const newFor = el.getAttribute('for').replace('__index__', supportIndex);
                    el.setAttribute('for', newFor);
                }
            });

            document.getElementById('support-container').appendChild(clone);
            supportIndex++;
            attachDeleteEvents();
        });

        attachDeleteEvents();
    </script>

    <script>
        document.querySelectorAll('.btn-color-main').forEach(btn => {
            btn.addEventListener('click', function() {
                const showColorDiv = document.querySelector('.show-colo-mainr');
                if (btn.value === 'choose') {
                    showColorDiv.innerHTML =
                        `<input class="form-control" type="color" value="{{ $setting->main_color }}" name="main_color" id="color-picker">`;
                } else if (btn.value === 'enter') {
                    showColorDiv.innerHTML =
                        `<input class="form-control" type="text" value="{{ $setting->main_color }}" name="main_color" id="color-input" placeholder="Mã Màu (VD: #FFFFFF)">`;
                }
            });
        });

        document.querySelectorAll('.btn-color-secondary').forEach(btn => {
            btn.addEventListener('click', function() {
                const showColorSecondary = document.querySelector('.show-color-secondary');
                if (btn.value === 'choose') {
                    showColorSecondary.innerHTML =
                        `<input class="form-control" type="color" value="{{ $setting->secondary_color }}" name="secondary_color" id="color-picker">`;
                } else if (btn.value === 'enter') {
                    showColorSecondary.innerHTML =
                        `<input class="form-control" type="text" value="{{ $setting->secondary_color }}" name="secondary_color" id="color-input" placeholder="Mã Màu (VD: #FFFFFF)">`;
                }
            });
        });
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
@endsection
