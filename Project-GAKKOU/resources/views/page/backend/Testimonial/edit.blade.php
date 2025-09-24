@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Testimonial</h4>
      <form class="forms-sample" action="{{ route('admin.testimonial.update', $testimonials->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $testimonials->name) }}" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control" name="description" value="{{ old('description', $testimonials->description) }}" placeholder="Enter description">
        </div>

        <div class="form-group">
          <label>Rating</label>
          <input type="hidden" class="form-control" name="stars" id="stars" value="{{ old('stars', $testimonials->stars) }}">
          <br>
          @for ($i = 1; $i <= 5; $i++)
            <span class="star {{ $i <= old('stars', $testimonials->stars) ? 'selected' : '' }}" data-value="{{ $i }}">
              &#9733;
            </span>
          @endfor
        </div>

        <div class="form-group">
          <label>File upload</label>
          <input type="file" id="fileInput" style="display: none;" name="photo">
          <div class="input-group col-xs-12 mb-2">
            <input type="text" class="form-control file-upload-info" placeholder="Choose file" disabled>
            <span class="input-group-append">
              <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click();">Upload</button>
            </span>
          </div>

          <div class="mt-2" style="width:150px; height:150px; display:flex; align-items:center; justify-content:center;">
            <img id="preview"
                 src="{{ $testimonials->photo && file_exists(public_path('storage/' . $testimonials->photo)) ? asset('storage/' . $testimonials->photo) : '' }}"
                 style="max-width:100%; max-height:100%; display:{{ $testimonials->photo && file_exists(public_path('storage/' . $testimonials->photo)) ? 'block' : 'none' }};"
                 alt="Preview Photo">
          </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a href="{{ route('admin.testimonial') }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>

<style>
  .star { font-size: 30px; cursor: pointer; color: lightgray; transition: 0.2s; }
  .star.selected { color: gold; }
  .star:hover { transform: scale(1.2); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const fileInput = document.getElementById('fileInput');
  const preview = document.getElementById('preview');
  const fileNameInput = document.querySelector('.file-upload-info');

  if (fileInput) {
    fileInput.addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file) {
        if (fileNameInput) fileNameInput.value = file.name;
        const reader = new FileReader();
        reader.onload = function (ev) {
          preview.src = ev.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        if (fileNameInput) fileNameInput.value = '';
        preview.src = '';
        preview.style.display = 'none';
      }
    });
  }

  const stars = document.querySelectorAll('.star');
  const starsInput = document.getElementById('stars');
  if (stars.length && starsInput) {
    const cur = parseInt(starsInput.value || '0', 10);
    if (cur > 0) {
      for (let i = 0; i < cur && i < stars.length; i++) stars[i].classList.add('selected');
    }

    stars.forEach((star) => {
      star.addEventListener('click', function () {
        const value = parseInt(this.getAttribute('data-value') || '0', 10);
        starsInput.value = value;
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < value; i++) stars[i].classList.add('selected');
      });
    });
  }
});
</script>
@endsection
