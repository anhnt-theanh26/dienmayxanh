@extends('layout.admin')

@section('title', 'Show Account')

@section('css')
    @include('admin.elements.css')
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/administrator/assets/vendor/css/pages/app-email.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Show</h4>
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
    <div class="app-email" style="overflow: auto">
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ $user->image ? asset($user->image) : asset('./storage/default.jpg') }}" alt="user-avatar"
                        class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <div class="text-muted">
                            Name:
                            <span class="text-black">{{ $user->name }}</span>
                        </div>
                        <div class="text-muted">
                            Phone:
                            <span class="text-black">{{ $user->phone }}</span>
                        </div>
                        <div class="text-muted">
                            Email:
                            <span class="text-black">{{ $user->email }}</span>
                        </div>
                        <div class="text-muted">
                            Address:
                            <span class="text-black">{{ $user->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" value="{{ $user->name }}" readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" value="{{ $user->email }}"
                            placeholder="Email" readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">+84</span>
                            <input type="text" id="phone" class="form-control" value="{{ $user->phone }}"
                                placeholder="" readonly />
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ $user->address }}"
                            placeholder="Address" readonly />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="flatpickr-datetime" class="form-label">Birthday</label>
                        <input type="text" class="form-control flatpickr-input" placeholder="YYYY-MM-DD HH:MM"
                            id="flatpickr-datetime" readonly="readonly" value="{{ $user->birthday }}" readonly>
                    </div>
                </div>
                <div class="mt-2">
                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}" class="text-muted float-end">List
                        User</a>
                    <button class="btn btn-primary btn-compose" data-bs-toggle="modal" data-bs-target="#emailComposeSidebar"
                        id="emailComposeSidebarLabel">
                        Send Mail
                    </button>
                </div>
            </div>
        </div>
        <div class="app-email-compose modal" id="emailComposeSidebar" tabindex="-1"
            aria-labelledby="emailComposeSidebarLabel" aria-hidden="true">
            <div class="modal-dialog m-0 me-md-4 mb-4 modal-lg">
                <div class="modal-content p-0">
                    <div class="modal-header py-3 bg-body">
                        <h5 class="modal-title fs-5">Compose Mail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 p-4 py-2">
                        <form action="{{ route('admin.user.sendmail') }}" method="post" class="email-compose-form">
                            @csrf
                            <div class="email-compose-to d-flex justify-content-between align-items-center">
                                <label class="form-label mb-0" for="emailContacts">To:</label>
                                <div class="select2-primary border-0 shadow-none flex-grow-1 mx-2">
                                    <select class="select2 select-email-contacts form-select" id="emailContacts"
                                        name="send_to_email[]" multiple>
                                        @foreach ($users as $item)
                                            <option data-avatar="{{ asset($item->image) }}" value="{{ $item->email }}"
                                                {{ $user->email == $item->email ? 'selected' : '' }}>
                                                {{ $item->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="email-compose-toggle-wrapper">
                                    <a class="email-compose-toggle-cc" href="javascript:void(0);">Cc |</a>
                                    <a class="email-compose-toggle-bcc" href="javascript:void(0);">Bcc</a>
                                </div>
                            </div>

                            <div class="email-compose-cc d-none">
                                <hr class="container-m-nx my-2" />
                                <div class="d-flex align-items-center">
                                    <label for="email-cc" class="form-label mb-0">Cc: </label>
                                    <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                        id="email-cc" name="email_cc" placeholder="someone@email.com" />
                                </div>
                            </div>
                            <div class="email-compose-bcc d-none">
                                <hr class="container-m-nx my-2" />
                                <div class="d-flex align-items-center">
                                    <label for="email-bcc" class="form-label mb-0">Bcc: </label>
                                    <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                        id="email-bcc" name="email_bcc" placeholder="someone@email.com" />
                                </div>
                            </div>
                            <hr class="container-m-nx my-2" />
                            <div class="email-compose-subject d-flex align-items-center mb-2">
                                <label for="email-subject" class="form-label mb-0">Subject:</label>
                                <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2"
                                    id="email-subject"name="email_subject" placeholder="Project Details" />
                            </div>
                            <div class="mb-3">
                                <textarea id="my-editor" name="content" class="form-control"></textarea>
                            </div>
                            <hr class="container-m-nx mt-0 mb-2" />
                            <div class="email-compose-actions d-flex justify-content-between align-items-center mt-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="ti ti-send ti-xs me-1"></i>Send
                                        </button>
                                    </div>
                                    <label for="attach-file"><i class="ti ti-paperclip cursor-pointer ms-2"></i></label>
                                    <input type="file" name="file_input" class="d-none" id="attach-file" />
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="reset" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
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
    <script src="{{ asset('/administrator/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/administrator/assets/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/app-email.js') }}"></script>
@endsection
