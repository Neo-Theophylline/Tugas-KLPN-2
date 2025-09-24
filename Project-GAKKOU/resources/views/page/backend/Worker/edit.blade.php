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
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name', $workers->name) }}">
                </div>

                <div class="form-group">
                    <label>Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Enter position" value="{{ old('position', $workers->position) }}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter description" value="{{ old('description', $workers->description) }}">
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="fileInput" style="display: none;" name="photo">
                    <div class="input-group col-xs-12 mb-2">
                        <input type="text" class="form-control file-upload-info" placeholder="Choose file" disabled>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    const fileNameInput = document.querySelector('.file-upload-info');

    if (fileInput) {
        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                if (fileNameInput) fileNameInput.value = file.name;
                const reader = new FileReader();
                reader.onload = function (ev) {
                    preview.src = ev.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                if (fileNameInput) fileNameInput.value = '';
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    }
});
</script>
@endsection
