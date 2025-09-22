@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create About</h4>
                <form class="forms-sample" action="/adminpanel/about/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Double Space for New Line">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Pre-description</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name="prescription" placeholder="Double Space for New Line">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="textarea" class="form-control" id="exampleInputName1"  name="description" placeholder="Double Space for New Line">
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
                    <a href="{{ route('admin.about') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
