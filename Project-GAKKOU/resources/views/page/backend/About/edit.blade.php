@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit About</h4>
                <form class="forms-sample" action="{{ route('admin.about.update', $abouts->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter the about section title"
                            value="{{ old('title', $abouts->title) }}">
                    </div>

                    <div class="form-group">
                        <label>Pre-Description</label>
                        <input type="text" class="form-control" name="prescription" placeholder="Enter the short pre-description"
                            value="{{ old('prescription', $abouts->prescription) }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter the main description"
                            value="{{ old('description', $abouts->description) }}">
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="fileInput" style="display:none;" name="photo" onchange="previewImage(event)">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" 
                                value="{{ $abouts->photo ? basename($abouts->photo) : '' }}" disabled placeholder="No file chosen">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            <img id="preview"
                                 src="{{ $abouts->photo && file_exists(public_path('storage/' . $abouts->photo)) ? asset('storage/' . $abouts->photo) : '' }}"
                                 style="max-width:100%; max-height:100%; {{ $abouts->photo && file_exists(public_path('storage/' . $abouts->photo)) ? '' : 'display:none;' }}"
                                 alt="Preview Photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.about') }}" class="btn btn-light">Cancel</a>
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
