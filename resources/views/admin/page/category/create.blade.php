@extends('layout.admin')

@section('title', 'Them moi')

@section('css')

@endsection

@include('ckfinder::setup')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Create</h4>
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
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create</h5>
                    <small class="text-muted float-end">Create</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" placeholder="Name" />
                                    </div>

                                    <div class="mb-3">
                                        @include('layout.images', [
                                            'title' => __('Ảnh'),
                                            'action' => 'view_images',
                                            'name' => 'images',
                                            'images' => '',
                                        ])
                                    </div>
                                    <div class="mb-3">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" class="switch-input" name="is_hot">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Is Hot</span>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_parent_id" class="form-label">Category</label>
                                        <select id="category_parent_id" name="category_parent_id" class="form-select">
                                            @foreach ($categoryParents as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        // var btnimagecategory = document.getElementById('btn-image-category');

        // btnimagecategory.onclick = function() {
        //     imageChoseClick('image');
        // };

        // function imageChoseClick(elementId) {
        //     CKFinder.popup({
        //         chooseFiles: true,
        //         width: 800,
        //         height: 600,
        //         onInit: function(finder) {
        //             finder.on('files:choose', function(evt) {
        //                 var file = evt.data.files.first();
        //                 var output = document.getElementById(elementId);
        //                 output.value = file.getUrl();
        //             });

        //             finder.on('file:choose:resizedImage', function(evt) {
        //                 var output = document.getElementById(elementId);
        //                 output.value = evt.data.resizedUrl;
        //             });
        //         }
        //     });
        // }
    </script>
@endsection
