@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Update</h4>
    <div class="card-body">
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="sku">Sku</label>
                                            <input type="text" class="form-control" id="sku" name="sku"
                                                value="{{ $product->sku }}" placeholder="sku" />
                                            @error('sku')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $product->name }}" placeholder="name" />
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label><br>
                                            <input id="thumbnail" class="form-control" type="hidden" name="image"
                                                value="{{ $product->image }}">
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
                                                    <img class="btn-image rounded-1 object-fit-contain"
                                                        src="{{ asset($product->image) }}"width="80px" alt="Image">
                                                </div>
                                            </div>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="switch switch-primary">
                                                <input type="checkbox" class="switch-input" name="is_hot" value="1"
                                                    @checked($product->is_hot == '1')>
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
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }} ({{ $item->parent->name }})</option>
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
                                                        @php
                                                            $usedAttributeIds = $product->attributeValues
                                                                ->pluck('attribute_id')
                                                                ->toArray();
                                                        @endphp
                                                        @foreach ($attributes as $item)
                                                            @if (!in_array($item->id, $usedAttributeIds))
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="attribute-choosed">
                                                @foreach ($product->attributeValues as $item)
                                                    <div class="mb-3 border rounded p-2">
                                                        <label>
                                                            <strong>{{ $item->attribute->name }}</strong>
                                                        </label>
                                                        <input type="hidden"
                                                            name="old_attribute_value[{{ $item->id }}][attribute_id]"value="{{ $item->attribute_id }}"
                                                            id="">
                                                        <input type="hidden"
                                                            name="old_attribute_value[{{ $item->id }}][id]"
                                                            value="{{ $item->id }}" id="">
                                                        <input type="text"
                                                            name="old_attribute_value[{{ $item->id }}][value]"
                                                            class="form-control mb-1"
                                                            placeholder="Enter value for {{ $item->attribute->name }}"
                                                            value="{{ $item->value }}">
                                                        <div class="more-fields-11"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="show-attribute">

                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-add-value-attribute">Add value to
                                            Attribute</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <h5 class="card-header">Variants</h5>
                                    <div class="card-body">
                                        <div id="variant-container-show">
                                            @foreach ($product->variants as $item)
                                                <div class="row variant-row">
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                        <input type="hidden" name="variants[{{ $item->id }}][id]"
                                                            value="{{ $item->id }}" id="">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" name="variants[{{ $item->id }}][name]"
                                                            class="form-control" placeholder="Name"
                                                            value="{{ $item->name }}" />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                        <label class="form-label">Price</label>
                                                        <input type="number" name="variants[{{ $item->id }}][price]"
                                                            class="form-control" placeholder="Price"
                                                            value="{{ $item->price }}" />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                        <label class="form-label">Price Old</label>
                                                        <input type="number"
                                                            name="variants[{{ $item->id }}][price_old]"
                                                            class="form-control" placeholder="Price Old"
                                                            value="{{ $item->price_old }}" />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                        <label class="form-label">Quantity</label>
                                                        <input type="text"
                                                            name="variants[{{ $item->id }}][stock_quantity]"
                                                            class="form-control" placeholder="Quantity"
                                                            value="{{ $item->stock_quantity }}" />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                        <label class="form-label">Status</label>
                                                        <select name="variants[{{ $item->id }}][status]"
                                                            class="form-control">
                                                            <option value="draft"
                                                                {{ $item->status == 'draft' ? 'selected' : '' }}>
                                                                Draft</option>
                                                            <option value="published"
                                                                {{ $item->status == 'published' ? 'selected' : '' }}>
                                                                Published</option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        class="mb-3 col-lg-12 col-xl-1 col-12 d-flex align-items-center mb-0">
                                                        <button type="button"
                                                            class="btn btn-label-danger mt-4 btn-delete-variant">
                                                            <i class="ti ti-x ti-xs me-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr />
                                            @endforeach
                                        </div>
                                        <div id="variant-container"></div>

                                        {{-- Template ẩn dùng để clone --}}
                                        <template id="variant-template">
                                            <div class="row variant-row">
                                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="newvariants[__index__][name]"
                                                        class="form-control" placeholder="Name" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="newvariants[__index__][price]"
                                                        class="form-control" placeholder="Price" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Price Old</label>
                                                    <input type="number" name="newvariants[__index__][price_old]"
                                                        class="form-control" placeholder="Price old" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="text" name="newvariants[__index__][stock_quantity]"
                                                        class="form-control" placeholder="Quantity" />
                                                </div>
                                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                                    <label class="form-label">Status</label>
                                                    <select name="newvariants[__index__][status]" class="form-control">
                                                        <option value="draft">Draft</option>
                                                        <option value="published">Published</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-lg-12 col-xl-1 col-12 d-flex align-items-center mb-0">
                                                    <button type="button"
                                                        class="btn btn-label-danger mt-4 btn-delete-variant">
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr />
                                        </template>
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
                                            <div class="imageUpload">
                                                <input id="thumbnails" class="form-control" type="hidden"
                                                    name="images">
                                                <div class="d-flex align-items-center">
                                                    <div class="input-group"
                                                        style="position: relative; display: inline-block; width: 80px;">
                                                        <img id="img" class="btn-image rounded-1"
                                                            src="{{ asset('./storage/default.jpg') }}" width="80px"
                                                            alt="Image">
                                                        <button id="lfms" data-input="thumbnails"
                                                            data-preview="holders" type="button"
                                                            class="btn btn-light btn-image rounded-1" id="choose-button"
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                            Choose
                                                        </button>
                                                    </div>
                                                    <div id="holders" class="mx-2" style="width: 100%"></div>
                                                </div>
                                                <div class="previewThumbnailList" style="display: flex; flex-wrap: wrap;">
                                                </div>
                                            </div>
                                            <div class="">
                                                @php
                                                    $imageUrl = null;
                                                    $imageArr = null;
                                                    if ($product->images->isNotEmpty()) {
                                                        $imageUrl = $product->images->first()->image;
                                                        if ($imageUrl) {
                                                            $imageArr = json_decode($imageUrl, true);
                                                            if (json_last_error() !== JSON_ERROR_NONE) {
                                                                $imageArr = null;
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                <div class="previewThumbnailList" style="display: flex; flex-wrap: wrap;">
                                                    <input type="hidden" class="imageUrlOld" name="imageUrlOld">
                                                    @if ($imageArr)
                                                        @foreach ($imageArr as $item)
                                                            <div class="position-relative py-2"
                                                                style="margin-right: 10px;">
                                                                <img src="{{ $item }}"
                                                                    style="width: 100px; height: auto;">
                                                                <div class="position-absolute top-0 end-0 text-danger cursor-pointer"
                                                                    onclick="removeImageOld('{{ $item }}')">
                                                                    <i class="ti ti-x"></i>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="image-preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                                            @error('images')
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
                                            <textarea id="my-editor" name="description" class="form-control">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Submit</button>
                        <a class="btn btn-secondary mt-3" href="{{ route('admin.product.index') }}"
                            class="text-muted float-end">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        var imgUrls = [];
        var imageUrlOld = document.querySelector('.imageUrlOld');

        function removeImageOld(imageUrl) {
            var imageWrapper = event.target.closest('.position-relative');
            if (imageWrapper) {
                imageWrapper.remove();
            }
            imgUrls.push(imageUrl);
            if (imageUrlOld) {
                imageUrlOld.value = imgUrls.join(',end,');;
            }
        }
    </script>
    {{-- biến thể --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let variantIndex = 0;

        function attachDeleteEvents() {
            document.querySelectorAll('.btn-delete-variant').forEach(button => {
                button.onclick = function() {
                    const variantRow = this.closest('.variant-row');
                    const parentContainer = variantRow.parentElement;

                    // Nếu trong khối variant mới (container mới), cho phép xóa hết
                    if (parentContainer.id === 'variant-container') {
                        Swal.fire({
                            title: 'Xóa biến thể này?',
                            text: 'Hành động này không thể hoàn tác.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Xóa',
                            cancelButtonText: 'Hủy',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                variantRow.remove();
                            }
                        });
                    } else {
                        // Có thể bạn muốn xử lý xóa biến thể cũ ở đây, hoặc gửi ID để xóa khi submit form
                        Swal.fire('Không thể xóa trực tiếp biến thể đã lưu.', '', 'info');
                    }
                };
            });
        }

        document.getElementById('add-variant').addEventListener('click', function() {
            const template = document.getElementById('variant-template');
            const clone = template.content.cloneNode(true);

            // Thay __index__ thành chỉ số thật
            clone.querySelectorAll('input, select').forEach(el => {
                const name = el.getAttribute('name');
                if (name) {
                    el.setAttribute('name', name.replace('__index__', variantIndex));
                }
            });

            document.getElementById('variant-container').appendChild(clone);
            variantIndex++;
            attachDeleteEvents();
        });

        attachDeleteEvents();
    </script>
    {{-- Validate before submit --}}
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;
            let flag = '';
            this.querySelectorAll('.variant-row').forEach(row => {
                row.querySelectorAll('input, select').forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        flag = 'variant';
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
                    flag = 'attribute';
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
                flag = 'sku';
            } else {
                sku.classList.remove('is-invalid');
            }

            if (!name.value.trim()) {
                name.classList.add('is-invalid');
                isValid = false;
                flag = 'name';
            } else {
                name.classList.remove('is-invalid');
            }
            if (!isValid) {
                e.preventDefault();
                console.log(flag);
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
    {{-- ckeditor --}}
    {{-- image --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
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
