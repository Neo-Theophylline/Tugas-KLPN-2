@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit partner</h4>
                <form class="forms-sample" action="{{ route('admin.partner.update', $partners->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Names"
                            name="name" value="{{ old('name', $partners->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Desc"
                            name="description" value="{{ old('description', $partners->description) }}">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div>
                            <br>
                            @if ($partners->photo)
                                <img src="{{ asset('storage/' . $partners->photo) }}" alt="Current Photo" height="100">
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.partner') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
