@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Gallery</h4>
                <form class="forms-sample" action="{{ route('admin.gallery.update', $galleries->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" 
                               value="{{ old('title', $galleries->title) }}" 
                               placeholder="Enter gallery title">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" 
                               value="{{ old('description', $galleries->description) }}" 
                               placeholder="Enter gallery description">
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="fileInput" style="display:none;" name="photo" onchange="previewImage(event)">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" disabled
                                   value="{{ $galleries->photo ? basename($galleries->photo) : '' }}" 
                                   placeholder="No file chosen">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            <img id="preview" 
                                 src="{{ $galleries->photo && file_exists(public_path('storage/' . $galleries->photo)) ? asset('storage/' . $galleries->photo) : '' }}" 
                                 style="max-width:100%; max-height:100%; {{ $galleries->photo && file_exists(public_path('storage/' . $galleries->photo)) ? '' : 'display:none;' }}" 
                                 alt="Preview Photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.gallery') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const fileInfo = document.querySelector('.file-upload-info');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
                fileInfo.value = input.files[0].name;
            }
        }
    </script>
@endsection
