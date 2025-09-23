@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Partner</h4>
                <form class="forms-sample" action="{{ route('admin.partner.update', $partners->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $partners->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="position" value="{{ old('position', $partners->position) }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description', $partners->description) }}">
                    </div>

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display:none;" name="photo" onchange="previewImage(event)">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" disabled>
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            <img id="preview" src="{{ $partners->photo && file_exists(public_path('storage/' . $partners->photo)) ? asset('storage/' . $partners->photo) : '' }}" 
                                style="max-width:100%; max-height:100%; display:{{ $partners->photo && file_exists(public_path('storage/' . $partners->photo)) ? 'block' : 'none' }};" 
                                alt="Preview Photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.partner') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
