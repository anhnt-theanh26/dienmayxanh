@extends('layout.admin')

@section('title', 'Them moi')

@section('css')

@endsection

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
                    <form action="{{ route('welcome.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="imageUpload">
                                            <input type="hidden" name="imageUrls" id="imageUrlsInput">
                                            <a href="javascript:void(0)" onclick="" id="LoadImage"
                                                class="btnAddImage"><div class="input-group" style="position: relative; display: inline-block; width: 100px;">
                                                    <img id="img" class="btn-image rounded-1" src="{{ asset('./storage/default.jpg') }}"
                                                        width="100px" alt="Image">
                                                    <button type="button" class="btn btn-light btn-image" id="choose-button"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2;
                                                                   background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                                                        Choose
                                                    </button>
                                                </div>
                                            </a>
                                            <div class="previewThumbnailList" style="display: flex; flex-wrap: wrap;">
                                            </div>
                                        </div>
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
        $('#LoadImage').click(function() {
            selectMultipleFilesWithCKFinder();
        });
        function selectMultipleFilesWithCKFinder() {
            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var files = evt.data.files.models;
                        var imageUrls = [];
                        var previewContainer = document.querySelector('.previewThumbnailList');
                        previewContainer.innerHTML = '';
                        files.forEach(function(file) {
                            var imageUrl = file.getUrl();
                            imageUrls.push(imageUrl);
                            var wrapper = document.createElement('div');
                            wrapper.className = 'position-relative';
                            wrapper.style.marginRight = '10px';


                            var img = document.createElement('img');
                            img.src = imageUrl;
                            img.style.width = '100px';
                            img.style.height = 'auto';
                            img.style.margin = '5px';
                            img.style.border = '1px solid #ccc';
                            img.style.borderRadius = '8px';

                            var closeBtn = document.createElement('div');
                            closeBtn.className =
                                'position-absolute top-0 end-0 text-danger cursor-pointer';
                            closeBtn.innerHTML = '<i class="ti ti-x"></i>';
                            closeBtn.onclick = function() {
                                wrapper.remove();
                                imageUrls = imageUrls.filter(url => url !== imageUrl);
                                document.getElementById('imageUrlsInput').value = imageUrls.join(',end,');
                            }

                            wrapper.appendChild(img);
                            wrapper.appendChild(closeBtn);
                            previewContainer.appendChild(wrapper);
                        });
                        document.getElementById('imageUrlsInput').value = imageUrls.join(',end,');
                    });
                }
            });
        }
    </script>
@endsection
