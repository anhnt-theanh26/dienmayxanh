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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Post/</span> Update</h4>
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
                    <form action="{{ route('admin.post.update', ['id' => $post->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $post->title }}" placeholder="Title" />
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="excerpt">Excerpt</label>
                                        <input type="text" class="form-control" id="excerpt" name="excerpt"
                                            value="{{ $post->excerpt }}" placeholder="Excerpt" />
                                        @error('excerpt')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" class="switch-input" name="is_hot" value="1"
                                                @checked($post->is_hot == '1')>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Is Hot</span>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft
                                            </option>
                                            <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>
                                                Published
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="flatpickr-datetime" class="form-label">Publish at</label>
                                        <input type="text" class="form-control flatpickr-input" name="published_at"
                                            placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime" readonly="readonly"
                                            value="{{ $post->published_at }}">
                                        @error('published_at')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select id="category_id" name="category_id" class="form-select">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $post->category_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }} ({{ $item->parent->name }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Image</label><br>
                                        <input id="thumbnail" class="form-control" type="hidden"
                                            name="image"value="{{ $post->image }}">
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
                                                    src="{{ asset($post->image) }}" height="80px" alt="Image">
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="content">Content</label>
                                        <textarea id="my-editor" name="content" class="form-control">{{ $post->content }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.post.index') }}"
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
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

    <!-- Vendors JS -->
    <script src="{{ asset('/administrator/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('/administrator/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="{{ asset('/administrator/assets/js/forms-pickers.js') }}"></script>

@endsection
