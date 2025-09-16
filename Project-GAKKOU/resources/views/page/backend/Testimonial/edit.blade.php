@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Testimonial</h4>
                <form class="forms-sample" action="{{ route('admin.testimonial.update', $testimonials->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $testimonials->name) }}" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ old('description', $testimonials->description) }}" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="stars">Rating</label>
                        <br>
                        <input type="hidden" class="form-control" name="stars" id="stars"
                            value="{{ old('stars', $testimonials->stars) }}">

                        @for ($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= old('stars', $testimonials->stars) ? 'selected' : '' }}"
                                data-value="{{ $i }}">
                                &#9733;
                            </span>
                        @endfor
                    </div>

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo">
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
                            @if ($testimonials->photo)
                                <img src="{{ asset('storage/' . $testimonials->photo) }}" alt="Current Photo"
                                    height="100">
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.testimonial') }}" class="btn btn-light">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
