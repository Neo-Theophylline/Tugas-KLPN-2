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
                        <input type="text" class="form-control" name="namemediasocial" value="{{ old('namemediasocial', $medias->namemediasocial) }}">
                    </div>

                    <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" class="form-control" name="nameaccount" value="{{ old('nameaccount', $medias->nameaccount) }}">
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{ old('link', $medias->link) }}">
                    </div>

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display:none;" name="photo" onchange="previewImage(event)">
                        <div class="input-group col-xs-12 mb-2">
                            <input type="text" class="form-control file-upload-info" disabled>
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
                            <img id="preview" src="{{ $medias->photo && file_exists(public_path('storage/' . $medias->photo)) ? asset('storage/' . $medias->photo) : '' }}" 
                                style="max-width:100%; max-height:100%; display:{{ $medias->photo && file_exists(public_path('storage/' . $medias->photo)) ? 'block' : 'none' }};" 
                                alt="Preview Photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.media') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
