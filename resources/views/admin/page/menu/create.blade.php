@extends('layout.admin')

@section('title', 'Them moi')

@section('css')

@endsection

@include('ckfinder::setup')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> Create</h4>
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
                    <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="defaultSelect" class="form-label">Default select</label>
                                        <select id="defaultSelect" class="form-select" name="locationmenu_id">
                                            @foreach ($locationmenus as $item)
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

@endsection
