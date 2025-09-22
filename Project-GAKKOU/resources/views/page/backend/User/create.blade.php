@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Account</h4>
                <form class="forms-sample" action="{{ route('users.store') }}" method="post">
                    @csrf
                     <div class="form-group">
                        <label for="exampleInputName1">Nm</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="nama"
                            name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="email"
                            name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">password</label>
                        <input type="password" class="form-control" id="exampleInputEmail3" placeholder="password"
                            name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
