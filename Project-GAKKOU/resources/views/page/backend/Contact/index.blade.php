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
                                <th style="width: 10%;">Name</th>
                                <th style="width: 30%;">Subject</th>
                                <th style="width: 30%;">Message</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $hero)
                                <tr>
                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $hero->id }}
                                    </td>
                                    <td class="align-middle text-wrap">
                                        {{ $hero->firstname }}

                                    </td>
                                    <td class="align-middle text-wrap">
                                        {{ $hero->subject }}

                                    </td>
                                    <td class="align-middle text-wrap">
                                        {{ $hero->message }}

                                    </td>
                                    <td class="align-middle">
                                        {{-- Baris Tombol --}}
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            {{-- Tombol Show Detail --}}
                                            <a href="{{ route('admin.contact.show', $hero->id) }}"
                                                class="btn btn-info btn-sm d-flex align-items-center mr-2">
                                                Show <i class="typcn typcn-eye ml-1"></i>
                                            </a>

                                            {{-- Tombol Delete --}}
                                            <form action="{{ route('admin.contact.destroy', $hero->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin mau hapus?');" class="mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm d-flex align-items-center">
                                                    Delete <i class="typcn typcn-delete-outline ml-1"></i>
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Toggle Switch --}}
                                        <div class="d-flex justify-content-center">
                                            <label class="toggle-switch toggle-switch-success mb-0">
                                                <input type="checkbox" checked>
                                                <span class="toggle-slider round"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
