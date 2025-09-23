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
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $user->email ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Password {{ isset($user) ? '(kosongkan jika tidak diubah)' : '' }}</label>
                        <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="photoInput" style="display:none;" name="photo"
                            onchange="previewImage(event)">
                        <div class="input-group">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('photoInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2"
                            style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            @if (isset($user) && $user->photo && file_exists(public_path('storage/' . $user->photo)))
                                <img id="preview" src="{{ asset('storage/' . $user->photo) }}" alt="Current Photo"
                                    style="max-width:100%; max-height:100%;">
                            @else
                                <img id="preview" src="" style="display:none; max-width:100%; max-height:100%;"
                                    alt="Preview Photo">
                            @endif
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
