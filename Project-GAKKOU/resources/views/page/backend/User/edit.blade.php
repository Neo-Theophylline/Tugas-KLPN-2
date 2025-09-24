@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="emailInput">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter email"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="passwordInput">New Password (optional)</label>
                    <input type="password" class="form-control" id="passwordInput" name="password"
                        placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label>Profile Photo</label>
                    <input type="file" id="fileInput" style="display:none;" name="photo">
                    <div class="input-group col-xs-12 mb-2">
                        <input type="text" class="form-control file-upload-info" placeholder="Upload New Image" disabled>
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button"
                                onclick="document.getElementById('fileInput').click();">Upload</button>
                        </span>
                    </div>
                    <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                        <img id="preview" 
                            src="{{ $user->photo && file_exists(public_path('storage/' . $user->photo)) ? asset('storage/' . $user->photo) : '' }}"
                            style="max-width:100%; max-height:100%; display: {{ $user->photo ? 'block' : 'none' }};" 
                            alt="Preview Photo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    const fileNameInput = document.querySelector('.file-upload-info');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file){
            if(fileNameInput) fileNameInput.value = file.name;
            const reader = new FileReader();
            reader.onload = function(ev){
                preview.src = ev.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            if(fileNameInput) fileNameInput.value = '';
            preview.src = '';
            preview.style.display = 'none';
        }
    });
});
</script>
@endsection
