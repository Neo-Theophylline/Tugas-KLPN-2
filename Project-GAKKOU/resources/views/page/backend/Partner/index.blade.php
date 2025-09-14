@extends('layout.backend.app')
@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped project-orders-table table-layout-fixed text-wrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">ID</th>
                                        <th style="width: 20%;">Photo</th>
                                        <th style="width: 15%;">name</th>
                                        <th style="width: 35%;">Description</th>
                                        <th style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($heroes as $hero) --}}
                                        <tr>
                                            <td class="align-middle">1</td>
                                            <td class="align-middle">
                                                {{-- <img style="object-fit:cover; border-radius:0; width:auto; height:100px;"
                                                    src="{{ asset('storage/' . $hero->photo) }}"
                                                     alt="Photo"> --}}
                                            </td>
                                            <td class="align-middle text-wrap">
                                                  {{-- {{ $hero->title }} --}} 

                                            </td>
                                            <td class="align-middle text-wrap">
                                                  {{-- {{ $hero->title }} --}} 

                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center mb-2">
                                                    <button type="button"
                                                        class="btn btn-success btn-sm btn-icon-text mr-3">
                                                        Edit
                                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                        Delete
                                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                    </button>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <label class="toggle-switch toggle-switch-success mb-0">
                                                        <input type="checkbox" checked>
                                                        <span class="toggle-slider round"></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    {{-- @endforeach --}}
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <a href="{{ route('admin.hero.create') }}"
                                                class="btn btn-success btn-icon-text">
                                                Create <i class="typcn typcn-edit btn-icon-append"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
