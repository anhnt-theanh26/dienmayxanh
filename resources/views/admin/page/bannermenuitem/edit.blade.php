@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu Item /</span> Update</h4>
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form class="form-repeater"
                        action="{{ route('admin.bannermenuitem.store', ['id' => $bannermenu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $bannermenu->name }}" placeholder="Name" required />
                                </div>
                                <div class="mb-3">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item="">
                                            <div class="row d-flex align-items-center">
                                                <div class="mb-3 col-lg-2 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Image</label><br>
                                                    <input class="form-control image-input" type="hidden" name="image">
                                                    <div class="d-flex align-items-center">
                                                        <div class="input-group"
                                                            style="position: relative; display: inline-block; width: 80px;">
                                                            <img class="btn-image rounded-1 image-preview"
                                                                src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                                alt="Image">
                                                            <button type="button"
                                                                class="btn btn-light btn-image rounded-1 choose-image-btn"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2;
                                                                    background: rgba(0, 0, 0, 0.4); color: white; font-weight: bold; text-align: center;">
                                                                Choose
                                                            </button>
                                                        </div>
                                                        <div class="mx-2" style="width: 100%"></div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-lg-9 col-xl-9 col-12 mb-0">
                                                    <label class="form-label" for="form-repeater-1-2">Link</label>
                                                    <input type="text" id="form-repeater-1-2" class="form-control"
                                                        name="link_banner_item" placeholder="Đường dẫn http....">
                                                </div>
                                                <div class="mb-3 col-lg-1 col-xl-1 col-1 d-flex align-items-center mb-0">
                                                    <a class="btn btn-label-danger mt-4 waves-effect"
                                                        data-repeater-delete="">
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="mb-0 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-primary" data-repeater-create>
                                            <i class="ti ti-plus me-1 text-white"></i>
                                            <span class="align-middle text-white">Add</span>
                                        </a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('admin.menu.index') }}"
                                    class="text-muted float-end">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bannermenuitem.update', ['id' => $bannermenu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-md mb-4 mb-md-2">
                                    <div class="col-12 mb-md-0 mb-4">
                                        <p>Vị trí đứng banner banner item</p>
                                        <ul class="list-group list-group-flush" id="handle-list-2">
                                            @foreach ($bannermenuitems as $bannermenuitem)
                                                <li class="list-group-item lh-1 d-flex justify-content-between align-items-center"
                                                    data-repeater-item>
                                                    <span class="d-flex align-items-center">
                                                        <i
                                                            class="drag-handle cursor-move ti ti-menu-2 align-text-bottom me-2"></i>
                                                        <input type="hidden" name="location_stand[]"
                                                            value="{{ $bannermenuitem->id }}">
                                                        <input class="form-control image-input" type="hidden"
                                                            name="image[]" value="{{ $bannermenuitem->image }}"
                                                            id="imageInput_{{ $bannermenuitem->id }}">
                                                        <div class="input-group"
                                                            style="position: relative; display: inline-block; width: 80px;">
                                                            <img class="btn-image rounded-1 image-preview"
                                                                src="{{ $bannermenuitem->image ? asset($bannermenuitem->image) : asset('./storage/default.jpg') }}"
                                                                width="80px" alt="Image"
                                                                id="preview_{{ $bannermenuitem->id }}">
                                                            <button type="button"
                                                                class="btn btn-light btn-image rounded-1 choose-image-btn"
                                                                id="lfm_{{ $bannermenuitem->id }}"
                                                                data-input="imageInput_{{ $bannermenuitem->id }}"
                                                                data-preview="preview_{{ $bannermenuitem->id }}"
                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2;
                                                                background: rgba(0, 0, 0, 0.4); color: white; font-weight: bold; text-align: center;">
                                                                Choose
                                                            </button>
                                                        </div>
                                                    </span>
                                                    <div class="mb-3 col-lg-9 col-xl-9 col-12 mb-0">
                                                        <label class="form-label" for="form-repeater-1-2">Link</label>
                                                        <input type="text" id="form-repeater-1-2" class="form-control"
                                                            name="link_banner_stay[]" placeholder="Đường dẫn http...."
                                                            value="{{ $bannermenuitem->link }}" required>
                                                    </div>
                                                    <span class="d-flex justify-content-between align-items-center">
                                                        <a class="dropdown-item" onclick="return confirm('Xoa?')"
                                                            href="{{ route('admin.bannermenuitem.destroy', ['id' => $bannermenuitem->id]) }}">
                                                            <i class="ti ti-trash me-1"></i>
                                                        </a>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('admin.menu.index') }}"
                                    class="text-muted float-end">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        function initializeFileManagers() {
            $('.choose-image-btn').off('click').on('click', function(e) {
                e.preventDefault();
                const button = $(this);
                const input = button.closest('.mb-3').find('.image-input');
                const previewImg = button.closest('.input-group').find('.image-preview');

                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=900,height=600');
                window.SetUrl = function(items) {
                    const filePath = items[0].url;
                    input.val(filePath);
                    previewImg.attr('src', filePath);
                };
            });
        }
        $(document).ready(function() {
            initializeFileManagers();
            $('[data-repeater-create]').click(function() {
                setTimeout(function() {
                    initializeFileManagers();
                }, 100);
            });
        });

        $(document).ready(function() {
            // Khởi tạo file manager cho từng nút
            $('[id^=lfm_]').each(function() {
                let buttonId = $(this).attr('id');
                let inputId = $(this).data('input');
                let previewId = $(this).data('preview');

                $('#' + buttonId).filemanager('image', {
                    prefix: '/laravel-filemanager', // Đường dẫn này phụ thuộc cấu hình của bạn
                    input_id: inputId
                });

                // Gắn sự kiện để cập nhật ảnh xem trước sau khi chọn
                $('#' + inputId).on('change', function() {
                    let imageUrl = $(this).val();
                    $('#' + previewId).attr('src', imageUrl);
                });
            });
        });
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/sortablejs/sortable.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/extended-ui-drag-and-drop.js') }}"></script>


    <script src="{{ asset('/administrator/assets/vendor/libs/autosize/autosize.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-extras.js') }}"></script>
@endsection
