@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Update</h4>
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
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $category->name }}" placeholder="Name" />
                                    </div>
                                   <div class="mb-3">
                                        <label class="form-label" for="image">Image</label><br>
                                        <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $category->image }}">
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
                                                <img class="btn-image rounded-1 object-fit-contain" src="{{ asset($category->image) }}"
                                                    height="80px" alt="Image">
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" class="switch-input" name="is_hot"
                                                {{ $category->is_hot ? 'checked' : '' }}>
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Is Hot</span>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_parent_id" class="form-label">Category Parent</label>
                                        <select id="category_parent_id" name="category_parent_id" class="form-select">
                                            @foreach ($categoryParents as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $category->category_parent_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.category.index') }}"
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
@endsection
