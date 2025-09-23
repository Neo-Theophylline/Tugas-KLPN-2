@extends('layout.backend.form')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Statistic</h4>
                <form class="forms-sample" action="/adminpanel/statistic/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Amount</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" name="amount">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('admin.history') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
