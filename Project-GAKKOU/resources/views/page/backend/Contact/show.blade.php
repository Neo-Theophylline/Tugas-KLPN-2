@extends('layout.backend.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <h4 class="mb-3" style="font-size: 1.25rem; color: #495057;">Contact Detail</h4>
            <table class="table table-bordered mb-0" style="font-size: 0.875rem; color: #495057;">
                <tr>
                    <th>First Name</th>
                    <td>{{ $contact->firstname }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $contact->lastname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $contact->phonenum }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{ $contact->subject }}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{ $contact->message }}</td>
                </tr>
            </table>

            <a href="{{ route('admin.contact') }}" class="btn btn-secondary mt-3">Back to list</a>
        </div>
    </div>
</div>
@endsection
