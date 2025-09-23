@extends('layout.backend.app')

@section('content')
<main class="main">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="row">
                
                <!-- Info Contact -->
                <div class="col-12">
                    <h4 class="mb-3 fw-light">{{ $contact->firstname }} {{ $contact->lastname }}</h4>
                    
                    <p class="text-muted mb-1"><strong>Email:</strong> {{ $contact->email }}</p>
                    <p class="text-muted mb-1"><strong>Phone:</strong> {{ $contact->phonenum }}</p>
                    <p class="text-muted mb-1"><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p class="text-muted mb-2"><strong>Message:</strong> {{ $contact->message }}</p>

                    <a href="{{ route('admin.contact') }}" class="btn btn-primary btn-sm mt-3">
                        Back to list
                    </a>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
