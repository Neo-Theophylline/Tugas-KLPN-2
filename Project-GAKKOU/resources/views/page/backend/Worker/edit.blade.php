@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Worker</h4>
                <form class="forms-sample" action="{{ route('admin.worker.update', $workers->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $workers->name) }}" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Position</label>
                        <input type="text" class="form-control" id="position" name="position"
                            value="{{ old('position', $workers->position) }}" placeholder="position">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Description</label>
                        <input type="text" class="form-control" id="discription" name="description"
                            value="{{ old('description', $workers->description) }}" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo"
                            onchange="previewImage(event)">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload New Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div>
                            <br>
                            <img id="preview" src="{{ $workers->photo ? asset('storage/' . $workers->photo) : '' }}"
                                alt="Current Photo" height="100">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.worker') }}" class="btn btn-light">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
