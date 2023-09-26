@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-title">Add Device</h3>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="code">Location Id:</label>
                    <input type="text" class="form-control" id="location_id" name="location_id" value="{{ $locationId }}" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label for="code">Number:</label>
                    <input type="number" class="form-control" id="number" name="number" required>
                </div>
                <br>
                <div class="form-group">
                    {{-- TODO: store the device types in the database and fetch and list them here instead of hardcoding --}}
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="">Select a Type</option>
                        <option value="1">POS</option>
                        <option value="2">KIOSK</option>
                        <option value="3">Digital Signage</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="image">Image Upload:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <br>

                <div class="form-group">
                    <label>Status:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1" required>
                        <label class="form-check-label" for="status_active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                        <label class="form-check-label" for="status_inactive">Inactive</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Location</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
