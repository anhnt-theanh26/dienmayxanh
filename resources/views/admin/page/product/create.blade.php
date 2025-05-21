@extends('layout.admin')

@section('title', 'Them moi')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Create</h4>
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
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="sku">Sku</label>
                                            <input type="text" class="form-control" id="sku" name="sku"
                                                value="{{ old('sku') }}" placeholder="sku" />
                                            @error('sku')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" placeholder="name" />
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label><br>
                                            <input id="thumbnail" class="form-control" type="hidden" name="image">
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
                                                <div id="holder" class="mx-2" style="width: 100%"></div>
                                            </div>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="switch switch-primary">
                                                <input type="checkbox" class="switch-input" name="is_hot" value="1"
                                                    @checked(old('is_hot') == '1')>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Is Hot</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select id="category_id" name="category_id" class="form-select">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                        ({{ $item->parent->name }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="select2Dark" class="form-label">Attribute</label>
                                            <div class="select2-dark" data-select2-id="46">
                                                <div class="position-relative" data-select2-id="45">
                                                    <select id="select2Dark"
                                                        class="select2 form-select select2-hidden-accessible"
                                                        multiple="">
                                                        @foreach ($attributes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="show-attribute">

                                            </div>
                                        </div>
                                        @error('attribute_value')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <button class="btn btn-primary btn-add-value-attribute">Add value to
                                            Attribute</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <h5 class="card-header">Variants</h5>
                                    <div class="card-body">
                                        <div id="variant-container">
                                            <div class="row variant-row">
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="variants[0][name]" class="form-control"
                                                        placeholder="Name" />
                                                    @error('variants.*.name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="variants[0][price]" class="form-control"
                                                        placeholder="Price" />
                                                    @error('variants.*.price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Price Old</label>
                                                    <input type="number" name="variants[0][price_old]"
                                                        class="form-control" placeholder="Price" />
                                                    @error('variants.*.price_old')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="text" name="variants[0][stock_quantity]"
                                                        class="form-control" placeholder="Quantity" />
                                                    @error('variants.*.stock_quantity')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Status</label>
                                                    <select name="variants[0][status]" class="form-control">
                                                        <option value="draft">Draft</option>
                                                        <option value="published">Published</option>
                                                    </select>
                                                    @error('variants.*.status')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-lg-12 col-xl-1 col-12 d-flex align-items-center mb-0">
                                                    <button type="button"
                                                        class="btn btn-label-danger mt-4 btn-delete-variant">
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="mb-0">
                                            <button type="button" id="add-variant" class="btn btn-primary">
                                                <i class="ti ti-plus me-1"></i>
                                                <span class="align-middle">Add</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="images">Images</label><br>
                                            <input id="thumbnails" class="form-control" type="hidden" name="images">
                                            <div class="d-flex align-items-center">
                                                <div class="input-group"
                                                    style="position: relative; display: inline-block; width: 80px;">
                                                    <img id="img" class="btn-image rounded-1"
                                                        src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                        alt="Image">
                                                    <button id="lfms" data-input="thumbnails" data-preview="holders"
                                                        type="button" class="btn btn-light btn-image rounded-1"
                                                        id="choose-button"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                        Choose
                                                    </button>
                                                </div>
                                                <div id="holders" class="mx-2" style="width: 100%"></div>
                                            </div>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea id="my-editor" name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                        <a class="btn btn-secondary mt-3" href="{{ route('admin.product.index') }}"
                            class="text-muted float-end">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    {{-- biến thể --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let variantIndex = 1;

        function attachDeleteEvents() {
            document.querySelectorAll('.btn-delete-variant').forEach(button => {
                button.onclick = function() {
                    const allRows = document.querySelectorAll('.variant-row');
                    if (allRows.length <= 1) {
                        Swal.fire('Oops!', 'At least one variant is required.', 'warning');
                        return;
                    }

                    Swal.fire({
                        title: 'Delete this variant?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('.variant-row').remove();
                        }
                    });
                };
            });
        }

        document.getElementById('add-variant').addEventListener('click', function() {
            const container = document.getElementById('variant-container');
            const firstRow = container.querySelector('.variant-row');
            const newRow = firstRow.cloneNode(true);

            // Reset input values & update name attributes
            newRow.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                const newName = name.replace(/\[\d+\]/, `[${variantIndex}]`);
                input.setAttribute('name', newName);
                if (input.tagName === 'INPUT') input.value = '';
                if (input.tagName === 'SELECT') input.selectedIndex = 0;
            });

            container.appendChild(newRow);
            variantIndex++;
            attachDeleteEvents();
        });

        attachDeleteEvents();
    </script>
    {{-- Validate before submit --}}
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;

            this.querySelectorAll('.variant-row').forEach(row => {
                row.querySelectorAll('input, select').forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
            });
            // Kiểm tra các attribute values
            const attributeValues = document.querySelectorAll('input[name^="attribute_value"]');
            attributeValues.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            // Kiểm tra các trường sku và name
            const sku = document.getElementById('sku');
            const name = document.getElementById('name');

            if (!sku.value.trim()) {
                sku.classList.add('is-invalid');
                isValid = false;
            } else {
                sku.classList.remove('is-invalid');
            }

            if (!name.value.trim()) {
                name.classList.add('is-invalid');
                isValid = false;
            } else {
                name.classList.remove('is-invalid');
            }
            if (!isValid) {
                e.preventDefault();
                Swal.fire('Missing fields', 'Please fill out all fields.', 'error');
            }
        });
    </script>
    {{-- end Validate before submit --}}
    {{-- hết biến thể --}}
    {{-- attribute --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Khởi tạo select2 nếu bạn chưa init
            $('#select2Dark').select2();

            const btnAdd = document.querySelector('.btn-add-value-attribute');
            const showAttr = document.querySelector('.show-attribute');

            btnAdd.addEventListener('click', function(e) {
                e.preventDefault();

                // Lấy danh sách option được chọn
                const selected = $('#select2Dark').val(); // array các ID

                let html = '';
                selected.forEach(function(id) {
                    const label = $('#select2Dark option[value="' + id + '"]').text();
                    html += `
                    <div class="mb-3 border rounded p-2">
                        <label><strong>${label}</strong></label>
                        <input type="text" name="attribute_value[${id}][]" class="form-control mb-1" placeholder="Enter value for ${label}">
                        <div class="more-fields-${id}"></div>
                    </div>
                `;
                });
                showAttr.innerHTML = html;
            });
        });
    </script>
    {{-- hết sttribute --}}
    {{-- image --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfms').filemanager('images');
    </script>
    {{-- editor --}}
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
    {{--  --}}
    <script src="{{ asset('/administrator/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/forms-selects.js') }}"></script>
    {{-- <script src="{{ asset('/administrator/assets/js/forms-tagify.js') }}"></script> --}}
    <script src="{{ asset('/administrator/assets/js/forms-typeahead.js') }}"></script>

@endsection
