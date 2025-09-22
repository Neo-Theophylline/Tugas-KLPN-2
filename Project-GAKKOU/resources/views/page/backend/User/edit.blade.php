@extends('layout.backend.form')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>

            <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nameInput">Nama</label>
                    <input type="text"
                           class="form-control"
                           id="nameInput"
                           name="name"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('name', $user->name) }}"
                           required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="emailInput">Email</label>
                    <input type="email"
                           class="form-control"
                           id="emailInput"
                           name="email"
                           placeholder="Masukkan email"
                           value="{{ old('email', $user->email) }}"
                           required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="passwordInput">Password Baru (opsional)</label>
                    <input type="password"
                           class="form-control"
                           id="passwordInput"
                           name="password"
                           placeholder="Masukkan password baru (minimal 6 karakter)">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
