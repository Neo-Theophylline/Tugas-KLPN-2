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
                    <table class="table table-striped project-orders-table table-layout-fixed text-wrap">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 20%;">Photo</th>
                                <th style="width: 15%;">Title</th>
                                <th style="width: 35%;">Description</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $hero)
                                <tr>
                                    <td class="align-middle"
                                        style="max-width: 80px; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                        {{ $hero->id }}
                                    </td>
                                    <td class="align-middle">
                                        <img style="object-fit:cover; border-radius:0; width:auto; height:100px;"
                                            src="{{ asset('storage/' . $hero->photo) }}" alt="Photo">
                                    </td>
                                    <td class="align-middle text-wrap">
                                        {{ $hero->title }}

                                    </td>
                                    <td class="align-middle text-wrap">
                                        {{ $hero->description }}

                                    </td>
                                    <td class="align-middle">
                                        {{-- Baris Tombol --}}
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('admin.service.edit', $hero->id) }}"
                                                class="btn btn-success btn-sm d-flex align-items-center mr-2">
                                                Edit <i class="typcn typcn-edit ml-1"></i>
                                            </a>

                                            {{-- Tombol Delete --}}
                                            <form action="{{ route('admin.service.destroy', $hero->id) }}" method="POST"
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
                                                <input type="checkbox" class="toggle-status" data-id="{{ $hero->id }}"
                                                    {{ $hero->is_active === 'active' ? 'checked' : '' }}>
                                                <span class="toggle-slider round"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-center">
                                    <a href="{{ route('admin.service.create') }}" class="btn btn-success btn-icon-text">
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
    <script>
document.querySelectorAll('.toggle-status').forEach((el) => {
    el.addEventListener('change', function() {
        let status = this.checked;
        let id = this.dataset.id;

        fetch("{{ route('admin.service.toggle') }}", {
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
                console.log("Hero status updated!");
            }
        });
    });
});
</script>
@endsection
