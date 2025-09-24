@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ isset($user) ? 'Edit User' : 'Create User' }}</h4>
            <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" 
                        value="{{ old('name', $user->name ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" 
                        value="{{ old('email', $user->email ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label>Password {{ isset($user) ? '(leave blank if not changed)' : '' }}</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" 
                        {{ isset($user) ? '' : 'required' }}>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="photoInput" style="display:none;" name="photo">
                    <div class="input-group">
                        <input type="text" class="form-control file-upload-info" placeholder="Upload Image" disabled>
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('photoInput').click();">Upload</button>
                        </span>
                    </div>
                    <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                        <img id="preview" 
                            src="{{ isset($user) && $user->photo && file_exists(public_path('storage/' . $user->photo)) ? asset('storage/' . $user->photo) : '' }}" 
                            style="max-width:100%; max-height:100%; display: {{ isset($user) && $user->photo ? 'block' : 'none' }};" 
                            alt="Preview Photo">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                <a href="{{ route('users.index') }}" class="btn btn-light mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const photoInput = document.getElementById('photoInput');
    const preview = document.getElementById('preview');
    const fileNameInput = document.querySelector('.file-upload-info');

    photoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            if (fileNameInput) fileNameInput.value = file.name;
            const reader = new FileReader();
            reader.onload = function (ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            if (fileNameInput) fileNameInput.value = '';
            preview.src = '';
            preview.style.display = 'none';
        }
    });
});
</script>
@endsection
