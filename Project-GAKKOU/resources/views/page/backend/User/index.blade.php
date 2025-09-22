@extends('layout.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 35%;">nama</th>
                                <th style="width: 35%;">email</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $auth)
                                <tr>
                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $auth->id }}
                                    </td>

                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $auth->name}}
                                    </td>

                                    <td class="align-middle"
                                        style="max-width: 150px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $auth->email }}
                                    </td>

                                    <td class="align-middle">
                                        {{-- Baris Tombol --}}
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('users.edit', $auth->id) }}"
                                                class="btn btn-success btn-sm d-flex align-items-center mr-2">
                                                Edit <i class="typcn typcn-edit ml-1"></i>
                                            </a>

                                            {{-- Tombol Delete --}}
                                            <form action="{{ route('users.destroy', $auth->id  ) }}" method="POST"
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
                                                <input type="checkbox" class="toggle-status" data-id="{{ $auth->id }}"
                                                    {{ $auth->is_active === 'active' ? 'checked' : '' }}>
                                                <span class="toggle-slider round"></span>
                                            </label>
                                        </div>
                                        </td>


                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" class="text-center">
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
document.querySelectorAll('.toggle-status').forEach((el) => {
    el.addEventListener('change', function() {
        let status = this.checked;
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
            }
        });
    });
});
</script>
@endsection
