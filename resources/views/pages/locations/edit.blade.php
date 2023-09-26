@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Edit Location</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('locations.update', $location->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="organization_id">Organization Id:</label>
                    <input type="text" class="form-control" id="organization_id" name="organization_id" value="{{ $location->organization_id }}" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label for="serial_number">Serial Number:</label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $location->serial_number }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Location Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $location->name }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="ipv4_address">IPV4 Address:</label>
                    <input type="text" class="form-control" id="ipv4_address" name="ipv4_address" value="{{ $location->ipv4_address }}" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update Location</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
