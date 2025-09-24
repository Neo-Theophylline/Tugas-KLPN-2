@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Media</h4>
            <form class="forms-sample" action="{{ route('admin.media.update', $medias->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Media Socials</label>
                    <input type="text" class="form-control" name="namemediasocial" 
                           placeholder="Enter media social name" 
                           value="{{ old('namemediasocial', $medias->namemediasocial) }}">
                </div>

                <div class="form-group">
                    <label>Account Name</label>
                    <input type="text" class="form-control" name="nameaccount" 
                           placeholder="Enter account name" 
                           value="{{ old('nameaccount', $medias->nameaccount) }}">
                </div>

                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" name="link" 
                           placeholder="Enter media link" 
                           value="{{ old('link', $medias->link) }}">
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="fileInput" style="display:none;" name="photo">
                    <div class="input-group col-xs-12 mb-2">
                        <input type="text" class="form-control file-upload-info" placeholder="Choose photo" readonly>
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                        </span>
                    </div>
                    <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                        <img id="preview" 
                             src="{{ $medias->photo && file_exists(public_path('storage/' . $medias->photo)) ? asset('storage/' . $medias->photo) : '' }}" 
                             style="max-width:100%; max-height:100%; display:{{ $medias->photo && file_exists(public_path('storage/' . $medias->photo)) ? 'block' : 'none' }};" 
                             alt="Preview Photo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="{{ route('admin.media') }}" class="btn btn-light">Cancel</a>
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
