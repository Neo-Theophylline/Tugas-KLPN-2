@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Hero</h4>
            <form class="forms-sample" action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" 
                        value="{{ old('title', $hero->title) }}" placeholder="Enter hero title">
                </div>

                <div class="form-group">
                    <label>Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" 
                        value="{{ old('subtitle', $hero->subtitle) }}" placeholder="Enter hero subtitle">
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="fileInput" style="display:none;" name="photo">
                    <div class="input-group col-xs-12 mb-2">
                        <input type="text" class="form-control file-upload-info" 
                            value="{{ old('photo', $hero->photo) }}" readonly>
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                        </span>
                    </div>
                    <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                        <img id="preview" 
                            src="{{ $hero->photo && file_exists(public_path('storage/' . $hero->photo)) ? asset('storage/' . $hero->photo) : '' }}" 
                            style="max-width:100%; max-height:100%; {{ $hero->photo && file_exists(public_path('storage/' . $hero->photo)) ? '' : 'display:none;' }}" 
                            alt="Preview Photo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="{{ route('admin.hero') }}" class="btn btn-light">Cancel</a>
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
        fileNameInput.value = '{{ old('photo', $hero->photo) }}';
        preview.src = '{{ $hero->photo && file_exists(public_path('storage/' . $hero->photo)) ? asset('storage/' . $hero->photo) : '' }}';
        preview.style.display = '{{ $hero->photo && file_exists(public_path('storage/' . $hero->photo)) ? 'block' : 'none' }}';
    }
});
</script>
@endsection
