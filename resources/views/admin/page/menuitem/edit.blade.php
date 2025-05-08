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
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menuitem.store', ['id' => $menu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $menu->name }}" placeholder="Name" />
                                </div>
                                <div class="col-md mb-4 mb-md-2">
                                    <small class="text-light fw-semibold">Thuoc tinh</small>
                                    <div class="accordion mt-3" id="accordionWithIcon">
                                        @foreach ($categoryParents as $parent)
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header d-flex align-items-center">
                                                    <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accordion{{ $parent->id }}"
                                                        aria-expanded="false">
                                                        {{ $parent->name }}
                                                    </button>
                                                </h2>

                                                <div id="accordion{{ $parent->id }}" class="accordion-collapse collapse"
                                                    style="">
                                                    <div class="accordion-body">
                                                        @foreach ($parent->categories as $category)
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="{{ $category->id }}" name="category[]"
                                                                    value="{{ $category->id }}">
                                                                <label class="form-check-label"
                                                                    for="{{ $category->id }}">{{ $category->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header d-flex align-items-center">
                                                <button type="button" class="accordion-button collapsed"
                                                    data-bs-toggle="collapse" data-bs-target="#accordioncreate"
                                                    aria-expanded="false">
                                                    Tự tạo đường dẫn
                                                </button>
                                            </h2>

                                            <div id="accordioncreate" class="accordion-collapse collapse" style="">
                                                <div class="accordion-body">
                                                    <label class="form-label" for="basic-default-name">Name</label>
                                                    <input type="text" class="form-control" name="name_menu_item"
                                                        id="basic-default-name" placeholder="Tên hiển thị">
                                                    <label class="form-label" for="basic-default-name">Link</label>
                                                    <input type="text" class="form-control" id="basic-default-name"
                                                        placeholder="Đường dẫn http" name="link_menu_item">
                                                </div>
                                            </div>
                                        </div>
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
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update</h5>
                    <small class="text-muted float-end">Update</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menuitem.update', ['id' => $menu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-md mb-4 mb-md-2">
                                    <div class="col-12 mb-md-0 mb-4">
                                        <p>Vị trí đứng menu item</p>
                                        <ul class="list-group list-group-flush" id="handle-list-2">
                                            @foreach ($menuitems as $menuitem)
                                                <li
                                                    class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                                    <span class="d-flex justify-content-between align-items-center">
                                                        <i
                                                            class="drag-handle cursor-move ti ti-menu-2 align-text-bottom me-2"></i>
                                                        <input type="hidden" name="location_stand[]"
                                                            value="{{ $menuitem->id }}">
                                                        <span>{{ $menuitem->name }}</span>
                                                    </span>
                                                    <span class="d-flex justify-content-between align-items-center">
                                                        <a class="dropdown-item" onclick="return confirm('Xoa?')"
                                                            href="{{ route('admin.menuitem.destroy', ['id' => $menuitem->id]) }}">
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
    <script src="{{ asset('/administrator/assets/vendor/libs/sortablejs/sortable.js') }}"></script>
    <script src="{{ asset('/administrator/assets/js/extended-ui-drag-and-drop.js') }}"></script>
@endsection
