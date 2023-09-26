@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Add Organization</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('organizations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="code">Organization Code:</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Organization Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Organization</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
