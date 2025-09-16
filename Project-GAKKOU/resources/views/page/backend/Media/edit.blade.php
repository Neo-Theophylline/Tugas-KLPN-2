@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Media</h4>
                <form class="forms-sample" action="{{ route('admin.media.update', $medias->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Media Socials</label>
                        <input type="text" class="form-control" id="namemediasocial" name="namemediasocial"
                            value="{{ old('namemediasocial', $medias->namemediasocial) }}" placeholder="Media Social Name">
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Account Name</label>
                        <input type="text" class="form-control" id="nameaccount" name="nameaccount"
                            value="{{ old('nameaccount', $medias->nameaccount) }}" placeholder="Account Name">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Link</label>
                        <input type="text" class="form-control" id="Link" name="link"
                            value="{{ old('link', $medias->link) }}" placeholder="Account Link">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload New Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div>
                          <br>
                          @if ($medias->photo)
                            <img src="{{ asset('storage/' . $medias->photo) }}" alt="Current Photo" height="100">
                        @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.media') }}" class="btn btn-light">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
