@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Media</h4>
                <form class="forms-sample" action="/adminpanel/media/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Link</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Link" name="link">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Name Account</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="name Account" name="nameaccount">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Media Social Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="name Account" name="namemediasocial">
                    </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" id="fileInput" style="display: none;" name="photo">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="document.getElementById('fileInput').click();">Upload</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.media') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
