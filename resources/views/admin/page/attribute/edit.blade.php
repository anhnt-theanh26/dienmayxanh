@extends('layout.admin')

@section('title', 'Them moi')

@section('css')
@endsection

@include('ckfinder::setup')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Attribute/</span> Update</h4>
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
                    <form action="{{ route('admin.attribute.update', ['slug' => $attribute->slug]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <div class="card mb-4">
                              <div class="card-body">
                                  <div class="mb-3">
                                      <label class="form-label" for="name">Name</label>
                                      <input type="text" class="form-control" id="name" name="name"
                                          value="{{  $attribute->name }}" placeholder="Name" />
                                      @error('name')
                                          <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <button type="submit" class="btn btn-warning">Submit</button>
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
