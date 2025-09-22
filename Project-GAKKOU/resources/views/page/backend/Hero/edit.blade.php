@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Hero</h4>
                <form class="forms-sample" action="{{ route('admin.hero.update', $hero->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $hero->title) }}" placeholder="Double Space for New Line">
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            value="{{ old('subtitle', $hero->subtitle) }}" placeholder="Double Space for New Line">
                    </div>
                    
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo"
                            onchange="previewImage(event)">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload New Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                        <div>
                            <br>
                            <img id="preview" src="{{ $hero->photo ? asset('storage/' . $hero->photo) : '' }}"
                                alt="Current Photo" height="100">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.hero') }}" class="btn btn-light">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
