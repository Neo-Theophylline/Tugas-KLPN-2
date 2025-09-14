@extends('layout.backend.form')
@section('content')
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Gallery</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Subtitle</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Subtitle">
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.hero') }}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
@endsection