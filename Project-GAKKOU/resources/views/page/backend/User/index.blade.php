@extends('layout.backend.app')
@section('css')
    .table td img {
        width: 100px !important;
        height: 100px !important;
        object-fit: cover !important;
        display: block;
        margin: 0 auto;
    }
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 20%;">Photo</th>
                                <th style="width: 20%;">nama</th>
                                <th style="width: 30%;">email</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $hero)
                                <tr>
                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $hero->id }}
                                    </td>

                                    <td class="align-middle" style="width:100px; text-align:center;">
                                        @if ($hero->photo && file_exists(public_path('storage/' . $hero->photo)))
                                            <img style="object-fit:cover; width:auto; height:100px; border-radius:0;"
                                                src="{{ asset('storage/' . $hero->photo) }}" alt="Photo">
                                        @else
                                            <span>Belum ada foto</span>
                                        @endif
                                    </td>


                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $hero->name }}
                                    </td>

                                    <td class="align-middle"
                                        style="max-width: 150px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $hero->email }}
                                    </td>

                                    <td class="align-middle">
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            <a href="{{ route('users.edit', $hero->id) }}"
                                                class="btn btn-success btn-sm mr-2 d-flex align-items-center">
                                                Edit <i class="typcn typcn-edit ml-1"></i>
                                            </a>

                                            <form action="{{ route('users.destroy', $hero->id) }}" method="POST"
                                                class="mb-0 delete-user-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete <i class="typcn typcn-delete-outline ml-1"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="d-flex justify-content-center mt-2">
                                            <label class="toggle-switch toggle-switch-success mb-0">
                                                <input type="checkbox" class="toggle-status" data-id="{{ $hero->id }}"
                                                    {{ $hero->is_active === 'active' ? 'checked' : '' }}>
                                                <span class="toggle-slider round"></span>
                                            </label>
                                        </div>
                                    </td>



                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="6" class="text-center">
                                    {{-- Tombol Create --}}
                                    <a href="{{ route('users.create') }}" class="btn btn-success btn-icon-text">
                                        Create <i class="typcn typcn-edit ml-1"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.delete-user-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Yakin mau hapus?')) {
                    e.preventDefault(); // batalkan submit
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.toggle-status').forEach((el) => {
            el.addEventListener('change', function() {
                let status = this.checked ? 'active' : 'inactive'; // HARUS 'active' / 'inactive'
                let id = this.dataset.id;

                fetch("{{ route('admin.users.toggle') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            id: id,
                            status: status
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            console.log("User status updated!");
                        } else {
                            console.error("Failed to update status");
                        }
                    });
            });
        });
    </script>
@endsection
