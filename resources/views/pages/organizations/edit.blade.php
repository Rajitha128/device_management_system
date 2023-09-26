@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Edit Organization</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="code">Organization Code:</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $organization->code }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Organization Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $organization->name }}" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update Organization</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
