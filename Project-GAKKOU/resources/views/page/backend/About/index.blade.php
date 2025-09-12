@extends('layout.backend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped project-orders-table table-layout-fixed text-wrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">ID</th>
                                        <th style="width: 20%;">Photo</th>
                                        <th style="width: 15%;">Title</th>
                                        <th style="width: 35%;">Subtitle</th>
                                        <th style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">
                                            <img style="object-fit:cover; border-radius:0; width:auto; height:100px;"
                                                src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="Photo">
                                        </td>
                                        <td class="align-middle text-wrap">Lorem, ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                            Inciduntnis commodi nostrum.
                                        </td>
                                        <td class="align-middle text-wrap">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Similique architecto impedit et aperiam. Teks ini panjang biar kelihatan wrap.
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="{{ route('admin.hero.edit') }}" class="btn btn-success btn-sm btn-icon-text mr-2">Edit <i class="typcn typcn-edit btn-icon-append"></i></a>
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
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <a href="{{ route('admin.hero.create') }}" class="btn btn-success btn-icon-text">
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
