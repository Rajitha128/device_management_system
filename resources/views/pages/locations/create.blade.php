@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Add Location</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="code">Organization Id:</label>
                    <input type="text" class="form-control" id="organization_id" name="organization_id" value="{{ $organizationId }}" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label for="code">Serial Number:</label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Location Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="ipv4_address">IPV4 Address:</label>
                    <input type="text" class="form-control" id="ipv4_address" name="ipv4_address" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Location</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
