@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Worker</h4>
                <form class="forms-sample" action="{{ route('admin.worker.update', $workers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $workers->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="position" value="{{ old('position', $workers->position) }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description', $workers->description) }}">
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" disabled>
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            <img id="preview"
                                src="{{ $workers->photo && file_exists(public_path('storage/' . $workers->photo)) ? asset('storage/' . $workers->photo) : '' }}"
                                style="max-width:100%; max-height:100%; display:{{ $workers->photo && file_exists(public_path('storage/' . $workers->photo)) ? 'block' : 'none' }};"
                                alt="Preview Photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.worker') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
