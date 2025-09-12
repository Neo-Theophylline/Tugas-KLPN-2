@extends('layout.backend.app')


@section('content')
<div class="col-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample" action="/adminpanel/hero/store" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="title">
                    </div>
                   <div class="form-group">
                      <label for="exampleTextarea1">subtitle</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="subtitle"></textarea>
                    </div>
                      <label>File upload</label>
                      <input type="file" name="photo" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection