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
                        <input type="text" class="form-control" id="nameInput" name="name"
                            value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="email" class="form-control" id="emailInput" name="email"
                            value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="passwordInput">New Password (optional)</label>
                        <input type="password" class="form-control" id="passwordInput" name="password"
                            placeholder="Enter new password">
                    </div>

                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" id="fileInput" style="display:none;" name="photo"
                            onchange="previewImage(event)">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload New Image" value="{{ old('photo', $user->photo) }}">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2"
                            style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            @if ($user->photo && file_exists(public_path('storage/' . $user->photo)))
                                <img id="preview" src="{{ asset('storage/' . $user->photo) }}" alt="Current Photo"
                                    style="max-width:100%; max-height:100%;">
                            @else
                                <img id="preview" src="" style="display:none; max-width:100%; max-height:100%;"
                                    alt="Preview Photo">
                            @endif
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
