@extends('layout.backend.app')

@section('content')
      <div class="row">
            <div class="col-md-15">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($heroes as $hero)
                      <tr>
                        <td><img src="{{ asset('storage/'.$hero->photo) }}" width="60"></td>
                        <td>{{$hero->title}}</td>
                        <td>{{$hero->subtitle}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              Edit
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button><br>
                            <br>
                            <label class="toggle-switch toggle-switch-success">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider round"></span>
                            </label>      
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td>#D2</td>
                        <td>Correlation natural resources silo</td>
                        <td>Mitchel Dunford</td>
                        <td>09 Oct 2019</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              Edit
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>
                            <br>
                            <label class="toggle-switch toggle-switch-success">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider round"></span>
                            </label>      
                          </div>
                        </td>
                      </tr>
                      <tr  class="center">
                        <td>
                          <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              Create
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection