@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create History</h4>
            <form class="forms-sample" action="/adminpanel/history/store" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter history title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter history description" value="{{ old('description') }}">
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="fileInput" style="display:none;" name="photo">
                    <div class="input-group col-xs-12 mb-2">
                        <input type="text" class="form-control file-upload-info" placeholder="No file chosen" readonly>
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                        </span>
                    </div>
                    <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                        <img id="preview" src="" style="max-width:100%; max-height:100%; display:none;" alt="Preview Photo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('admin.history') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const fileNameInput = document.querySelector('.file-upload-info');
    const preview = document.getElementById('preview');

    if (file) {
        fileNameInput.value = file.name;
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        fileNameInput.value = '';
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>
@endsection
