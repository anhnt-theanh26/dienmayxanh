@extends('layout.admin')

@section('title', 'Chinh sua')

@section('css')

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> Update</h4>
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
                    <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $menu->name }}" placeholder="Name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultSelect" class="form-label">Vi tri</label>
                                        <select id="defaultSelect" class="form-select" name="locationmenu_id">
                                            @foreach ($locationmenus as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $menu->locationmenu->id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.menu.index') }}"
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

@endsection
